<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{

	const BRUNCH = 7;
	const HOSTED_HOUSING = 8;
	const OUTREACH_SUPPORT = 11;
	const CONCERT_TICKET = 12;
	const BEACH_VOLLEYBALL_SALE = 13;
	const RUNNING_SALE = 14;

	static public function getBrunchPrice() {
		return self::whereId(self::BRUNCH)->first();
	}

	static public function getHostedHousingPrice() {
		return self::whereId(self::HOSTED_HOUSING)->first();
	}

	static public function getOutreachSupportPrice() {
		return self::whereId(self::OUTREACH_SUPPORT)->first();
	}

	static public function getConcertTicketPrice() {
		return self::whereId(self::CONCERT_TICKET)->first();
	}

	static public function getBeachVolleyballSale() {
		return self::whereId(self::BEACH_VOLLEYBALL_SALE)->first();
	}

	static public function getRunningSale() {
		return self::whereId(self::RUNNING_SALE)->first();
	}

}
