<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CandidateUpdate extends Notification
{
    use Queueable;
    public $status;
    public $description_user;
    public $responsible;
    public $date;
    public $user;

    public function __construct($status, $description_user, $responsible, $date, $phone)
    {
        $this->status = $status;
        $this->description_user = $description_user;
        $this->responsible = $responsible;
        $this->date = $date;
        $this->phone = $phone; // Menyimpan nomor telepon langsung ke properti $phone
    }

    public function via($notifiable)
    {
        return ['database', 'whatsapp'];
    }

    public function toArray($notifiable)
    {
        return [
            'type' => 'update_candidate',
            'data' => 'Intercipta Corporation, Anda memasuki tahap ' . $this->status . ' pada tanggal ' . $this->date . ' Note: ' . $this->description_user,
        ];
    }
    
    public function toWhatsapp($notifiable)
    {
        $historyLink = 'https://karir.interciptacorp.com/history';
        $reportLink = 'https://wa.me/6281190030570/';
        $formatted_date = date('j F Y', strtotime($this->date));
        $message = '';

        // Menyesuaikan pesan berdasarkan nilai $this->status
        if ($this->status == 1) {
            $message = 'Sementara, kamu Menunggu Penempatan tersedia dulu yaa!';
        } elseif ($this->status == 2) {
            $message = 'Selamat! Kamu memasuki tahap Training Newcomer Class';
        } elseif ($this->status == 3) {
            $message = 'Selamat! Kamu memasuki tahap Training gana New Class';
        } elseif ($this->status == 4) {
            $message = 'Selamat! Kamu memasuki tahap Interview User';
        } elseif ($this->status == 5) {
            $message = 'Mohon Maaf, Kamu Ditolak untuk pekerjaan ini';
        } else {
            // Jika nilai $this->status bukan 0 atau 1
            
            $message = 'Selamat kamu memasuki tahap ' . $this->status;
        }

        return [
            'number' => $this->phone,
            'data' => "Intercipta Corporation,\n\n" . $message . "\npada tanggal " . $formatted_date . "\n\nBertemu dengan " . $this->responsible . "\n\nNote:\n" . $this->description_user .  "\n\nLihat riwayat di sini\n" . $historyLink .  "\n\nInfo Pengaduan di\n" . $reportLink,
        ];
    }
}
