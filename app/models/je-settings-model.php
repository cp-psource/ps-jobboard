<?php

/**
 * @author:DerN3rd
 */
class JE_Settings_Model extends IG_Option_Model
{
    //general setting
    public $theme;
    public $use_certification;
    public $certification_label;
    public $open_for_days;
    public $plugins;

    public $terms;

    public $job_max_records;
    public $job_per_page;
    public $job_budget_range;
    public $job_new_job_status;
    public $job_allow_draft;
    public $job_sample_size;
    public $job_allow_discussion;
    public $hide_expired_from_archive;

    public $job_min_search_budget;
    public $job_max_search_budget;

    public $job_contact_form;
    public $job_contact_form_captcha;
    public $job_cc_admin;
    public $job_cc_sender;
    public $job_email_subject;
    public $job_email_content;

    public $expert_max_records;
    public $expert_per_page;
    public $expert_new_expert_status;
    public $expert_allow_draft;
    public $expert_sample_size;

    public $expert_contact_form;
    public $expert_contact_form_captcha;
    public $expert_cc_admin;
    public $expert_cc_sender;
    public $expert_email_subject;
    public $expert_email_content;

    //virtual page
    public $job_add;
    public $job_edit;
    public $job_contact;
    public $my_job;
    public $job_listing;

    public $expert_add;
    public $expert_edit;
    public $expert_listing;
    public $expert_contact;
    public $my_expert;

    public $landing_page;

    public $social_list;

    public $currency = 'EUR';
    public $curr_decimal = 1;
    public $curr_symbol_position = 1;

    public $allow_attachment = array();
    public $allow_avatar = array();

    protected $table = 'jobs_experts_settings';

    public function __construct()
    {
        parent::__construct();
        //$can_load=false;

        //no init, now we do the setting
        $this->theme = 'dark';
        $this->use_certification = 0;
        $this->certification_label = 'Jobs+ Certified';
        $this->open_for_days = '3,7,14,21';

        $this->job_max_records = 4;
        $this->job_per_page = 12;
        $this->job_budget_range = 1;
        $this->job_new_job_status = 'publish';
        $this->job_allow_draft = 1;
        $this->job_sample_size = 4;
        $this->job_contact_form = 0;
        $this->job_contact_form_captcha = 0;
        $this->job_min_search_budget = 0;
        $this->job_max_search_budget = 2000;
        $this->job_cc_admin = false;
        $this->job_cc_sender = false;
        $this->job_email_subject = 'SITE_NAME Kontaktanfrage: [ POST_TITLE ]';
        $this->job_email_content = 'Hi TO_NAME, Du hast eine Nachricht erhalten von

	Name: FROM_NAME
	Email: FROM_EMAIL
	Nachricht:

	FROM_MESSAGE


	Joblink: POST_LINK
	';

        $this->expert_max_records = 1;
        $this->expert_per_page = 12;
        $this->expert_budget_range = 1;
        $this->expert_new_expert_status = 'publish';
        $this->expert_allow_draft = 1;
        $this->expert_sample_size = 4;
        $this->expert_contact_form = 0;
        $this->expert_contact_form_captcha = 0;
        $this->expert_cc_admin = false;
        $this->expert_cc_sender = false;
        $this->expert_email_subject = 'SITE_NAME Kontaktanfrage: [ POST_TITLE ]';
        $this->expert_email_content = 'Hi TO_NAME, Du hast eine Nachricht erhalten von

	Name: FROM_NAME
	Email: FROM_EMAIL
	Nachricht:

	FROM_MESSAGE


	Expertenlink: POST_LINK
	';


        $this->social_list = array(
            'addthis' => 'Add This',
            'blogger' => 'Blogger',
            'deviantart' => 'Deviant Art',
            'digg' => 'Digg',
            'dribbble' => 'Dribbble',
            'email' => 'Email',
            'etsy' => 'Etsy',
            'facebook' => 'Facebook',
            'flickr' => 'Flickr',
            'foursquare' => 'Four Square',
            'github' => 'Github',
            'googleplus' => 'Google Plus',
            'hangouts' => 'Hangouts',
            'instagram' => 'Instagram',
            'linkedin' => 'Linkedin',
            'pinterest' => 'Pinterest',
            'reddit' => 'Reddit',
            'rss' => 'Rss',
            'skype' => 'Skype',
            'stackoverflow' => 'Stackoverflow',
            'tumblr' => 'Tumblr',
            'twitter' => 'Twitter',
            'vimeo' => 'Vimeo',
            'yelp' => 'Yelp',
            'youtube' => 'Youtube'
        );
        $this->load();
    }

	public function currency_list() {
		$currences = array(
			"ALL"     => array( "Albania, Leke", "4c, 65, 6b" ),
			"AFN"     => array( "Afghanistan, Afghanis", "60b" ),
			"ARS"     => array( "Argentina, Pesos", "24" ),
			"AWG"     => array( "Aruba, Guilders (also called Florins)", "192" ),
			"AUD"     => array( "Australia, Dollars", "24" ),
			"AZN"     => array( "Azerbaijan, New Manats", "43c, 430, 43d" ),
			"BSD"     => array( "Bahamas, Dollars", "24" ),
			"BBD"     => array( "Barbados, Dollars", "24" ),
			"BYR"     => array( "Belarus, Rubles", "70, 2e" ),
			"BZD"     => array( "Belize, Dollars", "42, 5a, 24" ),
			"BMD"     => array( "Bermuda, Dollars", "24" ),
			"BOB"     => array( "Bolivia, Bolivianos", "24, 62" ),
			"BAM"     => array( "Bosnia and Herzegovina, Convertible Marka", "4b, 4d" ),
			"BWP"     => array( "Botswana, Pulas", "50" ),
			"BGN"     => array( "Bulgaria, Leva", "43b, 432" ),
			"BRL"     => array( "Brazil, Reais", "52, 24" ),
			"BND"     => array( "Brunei Darussalam, Dollars", "24" ),
			"KHR"     => array( "Cambodia, Riels", "17db" ),
			"CAD"     => array( "Canada, Dollars", "24" ),
			"KYD"     => array( "Cayman Islands, Dollars", "24" ),
			"CLP"     => array( "Chile, Pesos", "24" ),
			"CNY"     => array( "China, Yuan Renminbi", "a5" ),
			"COP"     => array( "Colombia, Pesos", "24" ),
			"CRC"     => array( "Costa Rica, Colon", "20a1" ),
			"HRK"     => array( "Croatia, Kuna", "6b, 6e" ),
			"CUP"     => array( "Cuba, Pesos", "20b1" ),
			"CZK"     => array( "Czech Republic, Koruny", "4b, 10d" ),
			"DKK"     => array( "Denmark, Kroner", "6b, 72" ),
			"DOP"     => array( "Dominican Republic, Pesos", "52, 44, 24" ),
			"XCD"     => array( "East Caribbean, Dollars", "24" ),
			"EGP"     => array( "Egypt, Pounds", "45, 47, 50" ),
			"SVC"     => array( "El Salvador, Colones", "24" ),
			"EEK"     => array( "Estonia, Krooni", "6b, 72" ),
			"EUR"     => array( "Euro", "20ac" ),
			"FKP"     => array( "Falkland Islands, Pounds", "a3" ),
			"FJD"     => array( "Fiji, Dollars", "24" ),
			"GEL"     => array( "Georgia, lari", "6c, 61, 72, 69" ),
			"GHC"     => array( "Ghana, Cedis", "a2" ),
			"GIP"     => array( "Gibraltar, Pounds", "a3" ),
			"GTQ"     => array( "Guatemala, Quetzales", "51" ),
			"GGP"     => array( "Guernsey, Pounds", "a3" ),
			"GYD"     => array( "Guyana, Dollars", "24" ),
			"HNL"     => array( "Honduras, Lempiras", "4c" ),
			"HKD"     => array( "Hong Kong, Dollars", "24" ),
			"HUF"     => array( "Hungary, Forint", "46, 74" ),
			"ISK"     => array( "Iceland, Kronur", "6b, 72" ),
			"INR"     => array( "India, Rupees", "20a8" ),
			"IDR"     => array( "Indonesia, Rupiahs", "52, 70" ),
			"IRR"     => array( "Iran, Rials", "fdfc" ),
			"IMP"     => array( "Isle of Man, Pounds", "a3" ),
			"ILS"     => array( "Israel, New Shekels", "20aa" ),
			"JMD"     => array( "Jamaica, Dollars", "4a, 24" ),
			"JPY"     => array( "Japan, Yen", "a5" ),
			"JEP"     => array( "Jersey, Pounds", "a3" ),
			"KZT"     => array( "Kazakhstan, Tenge", "43b, 432" ),
			"KES"     => array( "Kenyan Shilling", "4B, 73, 68, 73" ),
			"KWD"     => array( "Kuwait, dinar", "4B, 2E, 44, 2E" ),
			"KGS"     => array( "Kyrgyzstan, Soms", "43b, 432" ),
			"LAK"     => array( "Laos, Kips", "20ad" ),
			"LVL"     => array( "Latvia, Lati", "4c, 73" ),
			"LBP"     => array( "Lebanon, Pounds", "a3" ),
			"LRD"     => array( "Liberia, Dollars", "24" ),
			"LTL"     => array( "Lithuania, Litai", "4c, 74" ),
			"MKD"     => array( "Macedonia, Denars", "434, 435, 43d" ),
			"MYR"     => array( "Malaysia, Ringgits", "52, 4d" ),
			"MUR"     => array( "Mauritius, Rupees", "20a8" ),
			"MXN"     => array( "Mexico, Pesos", "24" ),
			"MNT"     => array( "Mongolia, Tugriks", "20ae" ),
			"MAD"     => array( "Morocco, dirhams", "64, 68" ),
			"MZN"     => array( "Mozambique, Meticais", "4d, 54" ),
			"NAD"     => array( "Namibia, Dollars", "24" ),
			"NPR"     => array( "Nepal, Rupees", "20a8" ),
			"ANG"     => array( "Netherlands Antilles, Guilders (also called Florins)", "192" ),
			"NZD"     => array( "New Zealand, Dollars", "24" ),
			"NIO"     => array( "Nicaragua, Cordobas", "43, 24" ),
			"NGN"     => array( "Nigeria, Nairas", "20a6" ),
			"KPW"     => array( "North Korea, Won", "20a9" ),
			"NOK"     => array( "Norway, Krone", "6b, 72" ),
			"OMR"     => array( "Oman, Rials", "fdfc" ),
			"PKR"     => array( "Pakistan, Rupees", "20a8" ),
			"PAB"     => array( "Panama, Balboa", "42, 2f, 2e" ),
			"PYG"     => array( "Paraguay, Guarani", "47, 73" ),
			"PEN"     => array( "Peru, Nuevos Soles", "53, 2f, 2e" ),
			"PHP"     => array( "Philippines, Pesos", "50, 68, 70" ),
			"PLN"     => array( "Poland, Zlotych", "7a, 142" ),
			"QAR"     => array( "Qatar, Rials", "fdfc" ),
			"RON"     => array( "Romania, New Lei", "6c, 65, 69" ),
			"RUB"     => array( "Russia, Rubles", "440, 443, 431" ),
			"SHP"     => array( "Saint Helena, Pounds", "a3" ),
			"SAR"     => array( "Saudi Arabia, Riyals", "fdfc" ),
			"RSD"     => array( "Serbia, Dinars", "414, 438, 43d, 2e" ),
			"SCR"     => array( "Seychelles, Rupees", "20a8" ),
			"SGD"     => array( "Singapore, Dollars", "24" ),
			"SBD"     => array( "Solomon Islands, Dollars", "24" ),
			"SOS"     => array( "Somalia, Shillings", "53" ),
			"ZAR"     => array( "South Africa, Rand", "52" ),
			"KRW"     => array( "South Korea, Won", "20a9" ),
			"LKR"     => array( "Sri Lanka, Rupees", "20a8" ),
			"SEK"     => array( "Sweden, Kronor", "6b, 72" ),
			"CHF"     => array( "Switzerland, Francs", "43, 48, 46" ),
			"SRD"     => array( "Suriname, Dollars", "24" ),
			"SYP"     => array( "Syria, Pounds", "a3" ),
			"TWD"     => array( "Taiwan, New Dollars", "4e, 54, 24" ),
			"THB"     => array( "Thailand, Baht", "e3f" ),
			"TTD"     => array( "Trinidad and Tobago, Dollars", "54, 54, 24" ),
			"TRY"     => array( "Turkey, Lira", "54, 4c" ),
			"TRL"     => array( "Turkey, Liras", "20a4" ),
			"TVD"     => array( "Tuvalu, Dollars", "24" ),
			"UAH"     => array( "Ukraine, Hryvnia", "20b4" ),
			"AED"     => array( "United Arab Emirates, dirhams", "64, 68" ),
			"GBP"     => array( "United Kingdom, Pounds", "a3" ),
			"USD"     => array( "United States of America, Dollars", "24" ),
			"UYU"     => array( "Uruguay, Pesos", "24, 55" ),
			"UZS"     => array( "Uzbekistan, Sums", "43b, 432" ),
			"VEF"     => array( "Venezuela, Bolivares Fuertes", "42, 73" ),
			"VND"     => array( "Vietnam, Dong", "20ab" ),
			"XAF"     => array( "BEAC, CFA Francs", "46, 43, 46, 41" ),
			"XOF"     => array( "BCEAO, CFA Francs", "46, 43, 46, 41" ),
			"YER"     => array( "Yemen, Rials", "fdfc" ),
			"ZWD"     => array( "Zimbabwe, Zimbabwe Dollars", "5a, 24" ),
			"POINTS"  => array( "Points (for point based stores)", "50, 6f, 69, 6e, 74, 73" ),
			"Guthaben" => array( "Guthaben (for credit based stores)", "43, 72, 65, 64, 69, 74, 73" )
		);

		return apply_filters( 'je_currencies', $currences );
	}
}