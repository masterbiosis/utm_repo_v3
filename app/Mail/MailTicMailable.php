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
use App\Models\Directortesi;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class MailTicMailable extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        protected Correo $correo,
    ) {}

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('utm.repositorio.2025@gmail.com', 'Subdirección de Tecnologías de la Información'),
            subject: 'Credenciales de Director de Tesis para el Postgrado de Maestría.'
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.mail_directortesis_usuario',
            with: [
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

    public function usuarioDirectortesis($directortesis)
    {
        $password = Str::password(16, true, true, true, false);
        $directortes = Directortesi::where('id', $directortesis)->first();
        $this->correo->directortesi = $directortes;
        $this->correo->password = $password;

        $nombreDirectortesis = str_replace(" ", "_", $this->correo->directortesi->nombre);
        $app = $this->correo->directortesi->apellidop;
        $apm = $this->correo->directortesi->apellidop;
        $userName = strtolower($nombreDirectortesis . '_' . $app . '_' . $apm);

        if (Mail::to($this->correo->directortesi->email)->send(new MailTicMailable($this->correo))) {

            //dd("Correo enviado");
            $user = new User();
            $user->name = $userName;
            $user->email = $this->correo->directortesi->email;
            $user->password = $this->correo->password;
            $user->rol = 2; //1. admin 2. Tutor 3. Alumnno
            //dd($user);
            $user->save();
        }


        return redirect()->route('directortesis.index');
    }
}
