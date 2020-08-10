<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use Carbon\Carbon;
use Carbon\CarbonImmutable;

use App\Category;

class UserController extends Controller
{
    public function dashboard($date = null) {
        $user = Auth::user();
        $account = $user->accounts->load("entries")->first();

        $start = CarbonImmutable::now()->locale('fr_FR')->startOf("month");
        $end = CarbonImmutable::now()->locale('fr_FR')->endOf("month");

        if($date) {
            $start = CarbonImmutable::createFromFormat('m-Y', $date)->startOf("month");
            $end = CarbonImmutable::createFromFormat('m-Y', $date)->endOf("month");
        }

        $groupedEntries = $account->entries
            ->whereBetween('created_at', [$start, $end])
            ->load("category")
            ->sortBy("category.name")
            ->groupBy( function($entry) { return $entry->is_in ? "Entrée" : "Sortie"; })
            ->map( function($entriesByType) {
                return $entriesByType->groupBy( function($entry) {
                    return $entry->category ? $entry->category->name : null;
                });
            });

        if(!isset($groupedEntries["Sortie"])) { $groupedEntries["Sortie"] = [];}
        if(!isset($groupedEntries["Entrée"])) { $groupedEntries["Entrée"] = [];}

        return view("users.dashboard")->with([
            "user" => $user,
            "account" => $account,
            "groupedEntries" => $groupedEntries->sort(),
            "categories" => $user->categories,
            "date" => $start
        ]);
    }

    public function categories() {
        $user = Auth::user();

        return view("users.categories")->with([
            "categories" => $user->categories
        ]);
    }
}
