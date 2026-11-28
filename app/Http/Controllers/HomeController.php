<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function gallery()
    {
        return view('gallery');
    }

    public function contact()
    {
        $siteFile = resource_path('data/site.php');
        $aboutFile = resource_path('data/about.php');

        $siteData = file_exists($siteFile) ? require $siteFile : [];
        $aboutData = file_exists($aboutFile) ? require $aboutFile : [];

        // Pengolahan data dari site.php & about.php
        $brandName = ucwords(strtolower($siteData['brand'] ?? 'Made Kamasan'));
        $whatsappRaw = $siteData['contact']['whatsapp'] ?? '08xxxxxxxxxx';
        $instagram = $siteData['contact']['instagram'] ?? '@madekamasan_';
        $fullAddress = $siteData['location']['gmap'] ?? 'Jl. Pande Mas, Kamasan, Kec. Klungkung, Kabupaten Klungkung, Bali 80716';

        // Format nomor WhatsApp (+62 ...) & URL wa.me
        $cleanWa = preg_replace('/[^0-9]/', '', $whatsappRaw);
        if (str_starts_with($cleanWa, '0')) {
            $formattedWhatsapp = '+62 ' . substr($cleanWa, 1);
            $waNumber = '62' . substr($cleanWa, 1);
        } else {
            $formattedWhatsapp = $whatsappRaw;
            $waNumber = $cleanWa;
        }
        $waText = urlencode("Halo {$brandName}, saya ingin berkonsultasi mengenai karya seni lukis Kamasan.");
        $whatsappUrl = "https://wa.me/{$waNumber}?text={$waText}";

        // Format URL Instagram & Google Maps (akurat ke titik Plus Code FC24+2G5)
        $instagramUrl = 'https://instagram.com/' . ltrim($instagram, '@');
        $mapQuery = $siteData['location']['gmap_query'] ?? 'FC24+2G5, Kamasan, Kec. Klungkung, Kabupaten Klungkung, Bali 80716';
        $googleMapsUrl = 'https://www.google.com/maps/search/?api=1&query=' . urlencode($mapQuery);

        // Bersihkan prefix 'public/' agar sesuai dengan asset() Laravel
        $rawImage = $siteData['location']['images'] ?? 'assets/images/about/map.webp';
        $mapImage = preg_replace('/^public\//', '', $rawImage);

        // Data terstruktur untuk dikirim ke resources/views/contact.blade.php
        $studio = [
            'name' => $brandName,
            'business_type' => 'Studio Seni Lukis Tradisional Kamasan',
            'tagline' => $siteData['tagline'] ?? 'Preserving the Heritage of Kamasan Painting',
            'description' => $aboutData['studio'] ?? '',
            'whatsapp_formatted' => $formattedWhatsapp,
            'whatsapp_url' => $whatsappUrl,
            'instagram' => $instagram,
            'instagram_url' => $instagramUrl,
            'short_address' => $siteData['location']['address'] ?? 'Jl. Pande Mas, Klungkung, Bali',
            'full_address' => $fullAddress,
            'google_maps_url' => $googleMapsUrl,
            'map_image' => $mapImage,
            'operating_hours' => $siteData['hours'] ?? [
                'Senin — Sabtu' => '09:00 — 17:00 WITA',
                'Minggu & Hari Raya Suci' => 'Khusus Janji Temu',
            ],
        ];

        return view('contact', compact('studio'));
    }

    public function tracking()
    {
        return view('tracking');
    }
}