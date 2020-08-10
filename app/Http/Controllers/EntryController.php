<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Account;
use App\Entry;

use Carbon\Carbon;
use Carbon\CarbonImmutable;

use Auth;

class EntryController extends Controller
{
    public function create() {
        return view("entries.create");
    }

    public function store(Request $request) {
        if($request->ajax()) {
            $entry = Entry::create($request->only("label", "amount"));
            $entry->is_in = $request->get("is_in");

            $account = Account::find($request->get("account_id"));

            $account->entries()->save($entry);

            $start = CarbonImmutable::now()->startOf("month");
            $end = CarbonImmutable::now()->endOf("month");

            if($request->get("date")) {
                $entry->created_at = CarbonImmutable::createFromFormat('m-Y', $request->get("date"));
                $start = CarbonImmutable::createFromFormat('m-Y', $request->get("date"))->startOf("month");
                $end = CarbonImmutable::createFromFormat('m-Y', $request->get("date"))->endOf("month");
            }

            $entry->save();

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

            return response(["groupedEntries" => $groupedEntries]);
        }
    }

    public function update(Request $request, Entry $entry) {
        if($request->ajax()) {
            $account = $entry->account;

            $entry->fill($request->only("priority", "label", "details", "amount"));

            if($request->get("category_id")) {
                if($request->get("category_id") === -1) {
                    $entry->category()->dissociate();
                }else{
                    $entry->category()->associate($request->get("category_id"));
                }
            }

            $entry->save();

            $start = CarbonImmutable::now()->startOf("month");
            $end = CarbonImmutable::now()->endOf("month");

            if($request->get("date")) {
                $start = CarbonImmutable::createFromFormat('m-Y', $request->get("date"))->startOf("month");
                $end = CarbonImmutable::createFromFormat('m-Y', $request->get("date"))->endOf("month");
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

            return response(["groupedEntries" => $groupedEntries]);
        }
    }

    public function edit(Entry $entry) {
        $user = Auth::user();

        return view("entries.edit")->with([
            "user" => $user,
            "categories" => $user->categories,
            "entry" => $entry
        ]);
    }

    public function delete(Entry $entry) {
        $entry->delete();

        return redirect()->route("users.dashboard");
    }
}
