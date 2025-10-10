<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

use Illuminate\Mail\Mailables\Address;
use Illuminate\Support\Str;
use App\Models\Alumno;
use App\Models\Correo;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class MailtestMailable extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        protected Correo $correo,
    ) {
        //

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('utm.repositorio.2025@gmail.com', 'Subdirección de Tecnologías de la Información'),
            subject: 'IMAIT, confirmación de correo.'
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.mail_alumno_confirmar',
            with: [
                //'nombre'=>$this->alumno->nombre.' '.$this->alumno->apellidop.' '.$this->alumno->apellidom
                //'alumno'=>$this->alumno,
                'correo' => $this->correo

            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }

    public function validar_alumno($alumno)
    {
        //Mail::to("julio.correa.777@gmail.com")->send(new MailAlumnoFinalizadoMailable);
        //dd($alumno);
        $password = Str::password(16, true, true, true, false);

        //dd($password);
        $alumno = Alumno::where('id', $alumno)->first();
        //dd($alumno);
        $this->correo->alumno = $alumno;

        $this->correo->password = $password;
        $this->correo->link_verificacion = 'por_preparar';
        //dd(var_dump($this->correo->alumno->email));
        //dd(var_dump($this->correo));

        $nombreAlumno = str_replace(" ", "_", $this->correo->alumno->nombre);
        $app = $this->correo->alumno->apellidop;
        $apm = $this->correo->alumno->apellidop;
        $userName = strtolower($nombreAlumno . '_' . $app . '_' . $apm);
        //dd($userName);

        if (Mail::to($this->correo->alumno->email)->send(new MailtestMailable($this->correo))) {

            //dd("Correo enviado");
            $user = new User();
            $user->name = $userName;
            $user->email = $this->correo->alumno->email;
            $user->password = $this->correo->password;
            $user->rol = 3; //1. admin 2. Tutor 3. Alumnno
            //dd($user);
            $user->save();
            $alumno->update([
                'estado'=>'finalizado'
            ]);
        }


        return redirect()->route('directortesis.index');
    }
}
