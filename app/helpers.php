<?php

use App\Models\Category;
use App\Models\Notification;
use App\Models\Produit;
use App\Models\Visiteur;
use App\Models\Session;

function getExcerpt($content, $length)
{
    return substr($content, 0, $length) . '... ';
}

function getCategories()
{
    $categories = Category::all();

    return $categories;
}

function getPrice($price)
{
    $prix = floatval($price) / 100;

    return number_format($prix, 2, '.', ' ');
}

function getCommande($content)
{

    $produits = [];

    foreach (unserialize($content) as $produit_data) {
        foreach ($produit_data as $produit) {
            $produits[] = $produit;
        }
    }

    return $produits;
}

function getNewProduit()
{
    $produits = Produit::where('isNew', true)->get();
    return $produits;
}

function getIp()
{

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    $date = date('m');
    $visiteur = Visiteur::where('ip', $ip)->get();
    $vstr = new Visiteur();
    if ($visiteur->count() == 0) {
        $vstr->ip = $ip;
        $vstr->month = $date;
        $vstr->save();
    }
}

function getUserSession()
{
    session_start();
    if (!isset($_SESSION['users'])) {
        $_SESSION['users'] = "users";
        $date = date('m');
        $session = Session::where('month', $date)->first();

        if ($session)
            $count = $session->count;
        $count++;

        $session->update([
            "count" => $count
        ]);
    }
}


function format_date($date)
{
    $date_time = new DateTime($date);
    return $date_time;
}

function getNotifications($user_id)
{
    $notifications = Notification::where([
        'user_id' => $user_id,
        'isView' => 0
    ])->get();

    return $notifications;
}
function getNotificationsCount($user_id)
{
    $count = Notification::where([
        'user_id' => $user_id,
        'isView' => 0
    ])->get()->count();

    return $count;
}
