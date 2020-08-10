<?php

use Illuminate\Database\Seeder;

class EntriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('Entries')->delete();

        \DB::table('Entries')->insert(array (
            0 =>
            array (
                'account_id' => 1,
                'amount' => 13.7,
                'created_at' => '2020-05-02 10:45:19',
                'id' => 1,
                'is_in' => 0,
                'label' => 'Cafetière',
                'priority' => 1,
                'updated_at' => NULL,
            ),
            1 =>
            array (
                'account_id' => 1,
                'amount' => 14.06,
                'created_at' => '2020-05-02 10:45:26',
                'id' => 4,
                'is_in' => 0,
                'label' => 'André (Charcuterie)',
                'priority' => 0,
                'updated_at' => '2020-05-29 07:29:43',
            ),
            2 =>
            array (
                'account_id' => 1,
                'amount' => 700.0,
                'created_at' => '2020-05-02 10:45:27',
                'id' => 5,
                'is_in' => 1,
                'label' => 'Mensuel',
                'priority' => 1,
                'updated_at' => NULL,
            ),
            3 =>
            array (
                'account_id' => 1,
                'amount' => 600.0,
                'created_at' => '2020-05-02 10:45:27',
                'id' => 6,
                'is_in' => 1,
                'label' => 'Mensuel',
                'priority' => 1,
                'updated_at' => NULL,
            ),
            4 =>
            array (
                'account_id' => 1,
                'amount' => 114.0,
                'created_at' => '2020-05-02 10:45:28',
                'id' => 7,
                'is_in' => 0,
                'label' => 'Luminus',
                'priority' => 1,
                'updated_at' => NULL,
            ),
            5 =>
            array (
                'account_id' => 1,
                'amount' => 74.83,
                'created_at' => '2020-05-02 10:45:29',
                'id' => 8,
                'is_in' => 0,
                'label' => 'Proximus',
                'priority' => 1,
                'updated_at' => NULL,
            ),
            6 =>
            array (
                'account_id' => 1,
                'amount' => 18.07,
                'created_at' => '2020-05-02 10:45:12',
                'id' => 9,
                'is_in' => 0,
                'label' => 'André (Charcuterie)',
                'priority' => 1,
                'updated_at' => NULL,
            ),
            7 =>
            array (
                'account_id' => 1,
                'amount' => 9.53,
                'created_at' => '2020-05-02 10:45:14',
                'id' => 10,
                'is_in' => 0,
                'label' => 'Boucherie',
                'priority' => 1,
                'updated_at' => NULL,
            ),
            8 =>
            array (
                'account_id' => 1,
                'amount' => 750.0,
                'created_at' => '2020-05-02 10:45:15',
                'id' => 11,
                'is_in' => 0,
                'label' => 'Loyer',
                'priority' => 1,
                'updated_at' => NULL,
            ),
            9 =>
            array (
                'account_id' => 1,
                'amount' => 25.5,
                'created_at' => '2020-05-02 10:45:16',
                'id' => 12,
                'is_in' => 0,
                'label' => 'Cozybee',
                'priority' => 0,
                'updated_at' => NULL,
            ),
            10 =>
            array (
                'account_id' => 1,
                'amount' => 13.91,
                'created_at' => '2020-05-02 10:45:16',
                'id' => 13,
                'is_in' => 0,
                'label' => 'Okay',
                'priority' => 1,
                'updated_at' => NULL,
            ),
            11 =>
            array (
                'account_id' => 1,
                'amount' => 31.9,
                'created_at' => '2020-05-02 10:45:17',
                'id' => 14,
                'is_in' => 0,
                'label' => 'Petit producteur',
                'priority' => 1,
                'updated_at' => NULL,
            ),
            12 =>
            array (
                'account_id' => 1,
                'amount' => 2.75,
                'created_at' => '2020-05-02 10:45:18',
                'id' => 15,
                'is_in' => 0,
                'label' => 'Boulangerie',
                'priority' => 1,
                'updated_at' => NULL,
            ),
            13 =>
            array (
                'account_id' => 1,
                'amount' => 27.17,
                'created_at' => '2020-05-02 10:45:06',
                'id' => 16,
                'is_in' => 0,
                'label' => "Entre pot",
                'priority' => 1,
                'updated_at' => NULL,
            ),
            14 =>
            array (
                'account_id' => 1,
                'amount' => 11.15,
                'created_at' => '2020-05-02 10:45:18',
                'id' => 17,
                'is_in' => 0,
                'label' => 'Librairie',
                'priority' => 1,
                'updated_at' => NULL,
            ),
            15 =>
            array (
                'account_id' => 1,
                'amount' => 11.0,
                'created_at' => '2020-05-02 10:45:19',
                'id' => 18,
                'is_in' => 1,
                'label' => 'Retour',
                'priority' => 1,
                'updated_at' => NULL,
            ),
            16 =>
            array (
                'account_id' => 1,
                'amount' => 29.52,
                'created_at' => '2020-05-02 10:45:29',
                'id' => 19,
                'is_in' => 0,
                'label' => 'Okay',
                'priority' => 1,
                'updated_at' => NULL,
            ),
            17 =>
            array (
                'account_id' => 1,
                'amount' => 33.25,
                'created_at' => '2020-05-02 10:45:20',
                'id' => 20,
                'is_in' => 0,
                'label' => 'Delhaize',
                'priority' => 1,
                'updated_at' => NULL,
            ),
            18 =>
            array (
                'account_id' => 1,
                'amount' => 15.08,
                'created_at' => '2020-05-02 10:45:20',
                'id' => 21,
                'is_in' => 0,
            'label' => 'André (Charcuterie)',
                'priority' => 1,
                'updated_at' => '2020-05-29 16:23:05',
            ),
            19 =>
            array (
                'account_id' => 1,
                'amount' => 13.4,
                'created_at' => '2020-05-02 10:45:21',
                'id' => 22,
                'is_in' => 0,
                'label' => 'Fromagerie',
                'priority' => 1,
                'updated_at' => NULL,
            ),
            20 =>
            array (
                'account_id' => 1,
                'amount' => 7.95,
                'created_at' => '2020-05-02 10:45:21',
                'id' => 23,
                'is_in' => 0,
                'label' => 'Krefel',
                'priority' => 0,
                'updated_at' => '2020-05-29 07:32:59',
            ),
            21 =>
            array (
                'account_id' => 1,
                'amount' => 2.65,
                'created_at' => '2020-05-02 10:45:22',
                'id' => 24,
                'is_in' => 0,
                'label' => 'Carrefour',
                'priority' => 1,
                'updated_at' => NULL,
            ),
            22 =>
            array (
                'account_id' => 1,
                'amount' => 200.0,
                'created_at' => '2020-05-02 10:45:23',
                'id' => 25,
                'is_in' => 1,
                'label' => 'Retour',
                'priority' => 1,
                'updated_at' => NULL,
            ),
            23 =>
            array (
                'account_id' => 1,
                'amount' => 136.68,
                'created_at' => '2020-05-02 10:45:23',
                'id' => 26,
                'is_in' => 0,
                'label' => 'Proximus',
                'priority' => 1,
                'updated_at' => NULL,
            ),
            24 =>
            array (
                'account_id' => 1,
                'amount' => 26.22,
                'created_at' => '2020-05-02 10:45:25',
                'id' => 27,
                'is_in' => 0,
                'label' => 'Colruyt',
                'priority' => 1,
                'updated_at' => NULL,
            ),
            25 =>
            array (
                'account_id' => 1,
                'amount' => 2.0,
                'created_at' => '2020-05-02 10:45:25',
                'id' => 28,
                'is_in' => 0,
                'label' => 'Primeur',
                'priority' => 2,
                'updated_at' => '2020-05-29 07:30:18',
            ),
            26 =>
            array (
                'account_id' => 1,
                'amount' => 33.5,
                'created_at' => '2020-05-02 10:45:26',
                'id' => 29,
                'is_in' => 0,
                'label' => 'Petit Producteur',
                'priority' => 1,
                'updated_at' => NULL,
            ),
            27 =>
            array (
                'account_id' => 1,
                'amount' => 5.11,
                'created_at' => '2020-05-28 11:39:34',
                'id' => 30,
                'is_in' => 0,
                'label' => 'Boucherie',
                'priority' => 0,
                'updated_at' => '2020-05-29 16:23:14',
            ),
            28 =>
            array (
                'account_id' => 1,
                'amount' => 38.99,
                'created_at' => '2020-05-29 07:16:16',
                'id' => 31,
                'is_in' => 0,
                'label' => 'Colruyt',
                'priority' => 0,
                'updated_at' => '2020-05-29 07:16:22',
            ),
            29 =>
            array (
                'account_id' => 1,
                'amount' => 15.57,
                'created_at' => '2020-05-29 11:29:59',
                'id' => 32,
                'is_in' => 0,
            'label' => 'André (Charcuterie)',
                'priority' => 0,
                'updated_at' => '2020-05-29 11:30:05',
            ),
            30 =>
            array (
                'account_id' => 1,
                'amount' => 9.2,
                'created_at' => '2020-05-29 14:29:10',
                'id' => 33,
                'is_in' => 0,
                'label' => 'Primeur',
                'priority' => 0,
                'updated_at' => '2020-05-29 14:29:34',
            ),
            31 =>
            array (
                'account_id' => 1,
                'amount' => 38.9,
                'created_at' => '2020-05-29 14:29:19',
                'id' => 34,
                'is_in' => 0,
                'label' => 'Petit producteur',
                'priority' => 0,
                'updated_at' => '2020-05-29 14:29:37',
            ),
            32 =>
            array (
                'account_id' => 1,
                'amount' => 17.0,
                'created_at' => '2020-05-29 14:29:27',
                'id' => 35,
                'is_in' => 0,
                'label' => "Entre-pot",
                'priority' => 0,
                'updated_at' => '2020-05-29 16:23:29',
            ),
            33 =>
            array (
                'account_id' => 1,
                'amount' => 700.0,
                'created_at' => '2020-06-02 09:24:57',
                'id' => 36,
                'is_in' => 1,
                'label' => 'Dépôt mensuel',
                'priority' => 0,
                'updated_at' => '2020-06-02 09:24:58',
            ),
        ));


    }
}
