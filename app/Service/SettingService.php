<?php

namespace App\Service;

use App\Models\Setting;

class SettingService
{

    public $fields;
    public $timezones;
    public $dateFormats;
    public $lang;
    public $permalink;


    public $generalSettings;

    public function __construct()
    {
        $this->permalink = [
            ["value" => "bai-viet/{id}", "text" => "Plain (bai-viet/12)"],
            ["value" => "{year}/{month}/{day}/{title}", "text" => "Date and name (2019/04/18/post-title)"],
            ["value" => "{category}/{title}", "text" => "Category and name (cat-name/post-title), (*) TH có 2 category trở lên, sẽ lấy category đầu tiên!"],
            ["value" => "{title}", "text" => "Post (/post-title)"],
        ];

        $this->fields = [
            "TextEditor" => [
                "type" => "checkbox",
                "data" => [
                    "value" => "TextEditor",
                    "text" => "Text Editor",
                    'checked' => $this->checkCustomFields('TextEditor')
                ],
                "required" => false
            ],
            "text" => [
                "type" => "checkbox",
                "data" => [
                    "value" => "text",
                    "text" => "Text",
                    'checked' => $this->checkCustomFields('text')
                ],
                "required" => false
            ],
            "number" => [
                "type" => "checkbox",
                "data" => [
                    "value" => "number",
                    "text" => "Number",
                    'checked' => $this->checkCustomFields('number')
                ],
                "required" => false
            ],
            "email" => [
                "type" => "checkbox",
                "data" => [
                    "value" => "email",
                    "text" => "Email",
                    'checked' => $this->checkCustomFields('email')
                ],
                "required" => false
            ],
            "time" => [
                "type" => "checkbox",
                "data" => [
                    "value" => "time",
                    "text" => "Time",
                    'checked' => $this->checkCustomFields('time')
                ],
                "required" => false
            ],
            "boolean" => [
                "type" => "checkbox",
                "data" => [
                    "value" => "boolean",
                    "text" => "True or False",
                    'checked' => $this->checkCustomFields('boolean')
                ],
                "required" => false
            ],
            "image" => [
                "type" => "checkbox",
                "data" => [
                    "value" => "image",
                    "text" => "Image",
                    'checked' => $this->checkCustomFields('image')
                ],
                "required" => false
            ],
            "date" => [
                "type" => "checkbox",
                "data" => [
                    "value" => "date",
                    "text" => "Date",
                    'checked' => $this->checkCustomFields('date')
                ],
                "required" => false
            ],
        ];
        $date = getdate();
        $dateCase1 = $date['weekday'] . " " . $date['mday'] . ", " . $date['year'];
        $dateCase2 = $date['year'] . "-" . $date['mon'] . "-" . $date['mday'];
        $dateCase3 = $date['mon'] . "/" . $date['mday'] . "/" . $date['year'];
        $dateCase4 = $date['mday'] . "/" . $date['mon'] . "/" . $date['year'];

        $this->dateFormats = [
            ["value" => "M d, Y", "text" => $dateCase1],
            ["value" => "Y-m-d", "text" => $dateCase2],
            ["value" => "m/d/Y", "text" => $dateCase3],
            ["value" => "d/m/Y", "text" => $dateCase4],
        ];

        $this->timezones = [
            ["value" => "-12", "text" => "(GMT-12:00) International Date Line West"],
            ["value" => "-11", "text" => "(GMT-11:00) Midway Island, Samoa"],
            ["value" => "-10", "text" => "(GMT-10:00) Hawaii"],
            ["value" => "-09", "text" => "(GMT-09:00) Alaska"],
            ["value" => "-08", "text" => "(GMT-08:00) Pacific Time (US & Canada)"],
            ["value" => "-08 (1)", "text" => "(GMT-08:00) Tijuana, Baja California"],
            ["value" => "-07", "text" => "(GMT-07:00) Arizona"],
            ["value" => "-07 (1)", "text" => "(GMT-07:00) Chihuahua, La Paz, Mazatlan"],
            ["value" => "-07 (2)", "text" => "(GMT-07:00) Mountain Time (US & Canada)"],
            ["value" => "-06", "text" => "(GMT-06:00) Central America"],
            ["value" => "-06 (1)", "text" => "(GMT-06:00) Central Time (US & Canada)"],
            ["value" => "-06 (2)", "text" => "(GMT-06:00) Guadalajara, Mexico City, Monterrey"],
            ["value" => "-06 (3)", "text" => "(GMT-06:00) Saskatchewan"],
            ["value" => "-05", "text" => "(GMT-05:00) Bogota, Lima, Quito, Rio Branco"],
            ["value" => "-05 (1)", "text" => "(GMT-05:00) Eastern Time (US & Canada)"],
            ["value" => "-05 (2)", "text" => "(GMT-05:00) Indiana (East)"],
            ["value" => "-04", "text" => "(GMT-04:00) Atlantic Time (Canada)"],
            ["value" => "-04 (1)", "text" => "(GMT-04:00) Caracas, La Paz"],
            ["value" => "-04 (2)", "text" => "(GMT-04:00) Manaus"],
            ["value" => "-04 (3)", "text" => "(GMT-04:00) Santiago"],
            ["value" => "-03", "text" => "(GMT-03:30) Newfoundland"],
            ["value" => "-03 (1)", "text" => "(GMT-03:00) Brasilia"],
            ["value" => "-03 (2)", "text" => "(GMT-03:00) Buenos Aires, Georgetown"],
            ["value" => "-03 (3)", "text" => "(GMT-03:00) Greenland"],
            ["value" => "-03 (4)", "text" => "(GMT-03:00) Montevideo"],
            ["value" => "-02", "text" => "(GMT-02:00) Mid-Atlantic"],
            ["value" => "-01", "text" => "(GMT-01:00) Cape Verde Is."],
            ["value" => "-01 (1)", "text" => "(GMT-01:00) Azores"],
            ["value" => "+00", "text" => "(GMT+00:00) Casablanca, Monrovia, Reykjavik"],
            ["value" => "+00 (1)", "text" => "(GMT+00:00) Greenwich Mean Time : Dublin, Edinburgh, Lisbon, London"],
            ["value" => "+01", "text" => "(GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna"],
            ["value" => "+01 (1)", "text" => "(GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague"],
            ["value" => "+01 (2)", "text" => "(GMT+01:00) Brussels, Copenhagen, Madrid, Paris"],
            ["value" => "+01 (3)", "text" => "(GMT+01:00) Sarajevo, Skopje, Warsaw, Zagreb"],
            ["value" => "+01 (4)", "text" => "(GMT+01:00) West Central Africa"],
            ["value" => "+02", "text" => "(GMT+02:00) Amman"],
            ["value" => "+02 (1)", "text" => "(GMT+02:00) Athens, Bucharest, Istanbul"],
            ["value" => "+02 (2)", "text" => "(GMT+02:00) Beirut"],
            ["value" => "+02 (3)", "text" => "(GMT+02:00) Cairo"],
            ["value" => "+02 (4)", "text" => "(GMT+02:00) Harare, Pretoria"],
            ["value" => "+02 (5)", "text" => "(GMT+02:00) Helsinki, Kyiv, Riga, Sofia, Tallinn, Vilnius"],
            ["value" => "+02 (6)", "text" => "(GMT+02:00) Jerusalem"],
            ["value" => "+02 (7)", "text" => "(GMT+02:00) Minsk"],
            ["value" => "+02 (8)", "text" => "(GMT+02:00) Windhoek"],
            ["value" => "+03", "text" => "(GMT+03:00) Kuwait, Riyadh, Baghdad"],
            ["value" => "+03 (1)", "text" => "(GMT+03:00) Moscow, St. Petersburg, Volgograd"],
            ["value" => "+03 (2)", "text" => "(GMT+03:00) Nairobi"],
            ["value" => "+03 (3)", "text" => "(GMT+03:00) Tbilisi"],
            ["value" => "+03 (4)", "text" => "(GMT+03:30) Tehran"],
            ["value" => "+04", "text" => "(GMT+04:00) Abu Dhabi, Muscat"],
            ["value" => "+04 (1)", "text" => "(GMT+04:00) Baku"],
            ["value" => "+04 (2)", "text" => "(GMT+04:00) Yerevan"],
            ["value" => "+04 (3)", "text" => "(GMT+04:30) Kabul"],
            ["value" => "+05", "text" => "(GMT+05:00) Yekaterinburg"],
            ["value" => "+05 (1)", "text" => "(GMT+05:00) Islamabad, Karachi, Tashkent"],
            ["value" => "+05 (2)", "text" => "(GMT+05:30) Sri Jayawardenapura"],
            ["value" => "+05 (3)", "text" => "(GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi"],
            ["value" => "+05 (4)", "text" => "(GMT+05:45) Kathmandu"],
            ["value" => "+06", "text" => "(GMT+06:00) Almaty, Novosibirsk"],
            ["value" => "+06 (1)", "text" => "(GMT+06:00) Astana, Dhaka"],
            ["value" => "+06 (2)", "text" => "(GMT+06:30) Yangon (Rangoon)"],
            ["value" => "+07", "text" => "(GMT+07:00) Bangkok, Hanoi, Jakarta"],
            ["value" => "+07 (1)", "text" => "(GMT+07:00) Krasnoyarsk"],
            ["value" => "+08", "text" => "(GMT+08:00) Beijing, Chongqing, Hong Kong, Urumqi"],
            ["value" => "+08 (1)", "text" => "(GMT+08:00) Kuala Lumpur, Singapore"],
            ["value" => "+08 (2)", "text" => "(GMT+08:00) Irkutsk, Ulaan Bataar"],
            ["value" => "+08 (3)", "text" => "(GMT+08:00) Perth"],
            ["value" => "+08 (4)", "text" => "(GMT+08:00) Taipei"],
            ["value" => "+09", "text" => "(GMT+09:00) Osaka, Sapporo, Tokyo"],
            ["value" => "+09 (1)", "text" => "(GMT+09:00) Seoul"],
            ["value" => "+09 (2)", "text" => "(GMT+09:00) Yakutsk"],
            ["value" => "+09 (3)", "text" => "(GMT+09:30) Adelaide"],
            ["value" => "+09 (4)", "text" => "(GMT+09:30) Darwin"],
            ["value" => "+10", "text" => "(GMT+10:00) Brisbane"],
            ["value" => "+10 (1)", "text" => "(GMT+10:00) Canberra, Melbourne, Sydney"],
            ["value" => "+10 (2)", "text" => "(GMT+10:00) Hobart"],
            ["value" => "+10 (3)", "text" => "(GMT+10:00) Guam, Port Moresby"],
            ["value" => "+10 (4)", "text" => "(GMT+10:00) Vladivostok"],
            ["value" => "+11", "text" => "(GMT+11:00) Magadan, Solomon Is., New Caledonia"],
            ["value" => "+12", "text" => "(GMT+12:00) Auckland, Wellington"],
            ["value" => "+12 (1)", "text" => "(GMT+12:00) Fiji, Kamchatka, Marshall Is."],
            ["value" => "+13", "text" => "(GMT+13:00) Nuku'alofa"],
        ];

        $this->lang = [
            ["value" => "vi", "text" => "Tiếng Việt"],
            ["value" => "en", "text" => "English (United States)"],
        ];

        $this->generalSettings = [
            "date_formats" => [
                "type" => "option",
                "text" => "Date format",
                "data" => $this->dateFormats,
                "required" => true,
                "validate" => ['required']
            ],
            "timezones" => [
                "type" => "select",
                "text" => "Timezones",
                "data" => $this->timezones,
                "required" => true,
                "multiple" => false,
                "validate" => ['required']
            ],
            "lang" => [
                "type" => 'select',
                "text" => 'Language',
                "data" => $this->lang,
                "required" => true,
                "multiple" => false,
                "validate" => ['required']
            ]
        ];
    }

    public function getPermalink()
    {
        return $this->permalink;
    }

    public function getCustomFields()
    {
        return $this->fields;
    }

    public function getSettingGeneral()
    {
        return $this->generalSettings;
    }

    public function storeCustomFields($data)
    {
        $res = (object)[
            'code' => 200,
            'message' => 'Success!'
        ];
        try {
            file_put_contents(base_path('database/Json/fields.json'), json_encode($data));
        } catch (\Exception $exception) {
            $res = (object)[
                'code' => 500,
                'message' => 'System Error!'
            ];
        }
        return $res;
    }


    function checkCustomFields($value)
    {
        $data = json_decode(file_get_contents(base_path('database/Json/fields.json')), true);
        if (!empty($data)) {
            foreach ($data as $item) {
                if ($item === $value) {
                    return 1;
                }
            }
        }
        return 0;
    }

    function saveSettings($data)
    {
        $res = (object)[
            'code' => 200,
            'message' => 'Success!'
        ];
        try {
            foreach ($data as $key => $value) {
                Setting::updateOrCreate(['key' => $key], [
                    'value' => is_array($value) ? json_encode($value) : $value,
                ]);
            }
        } catch (\Exception $e) {
            $res = (object)[
                'code' => 500,
                'message' => 'System Error!'
            ];
        }
        return $res;
    }
}
