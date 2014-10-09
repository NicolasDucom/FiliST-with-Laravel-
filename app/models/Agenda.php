<?php

class Agenda
{
	public static function recupererPlanningDeLaSemaineCourantePourLaPromo($promo, $semaine)
	{
		$semaine += 19;

		$client = new GuzzleHttp\Client();
		$response = $client->get("http://dleguis.fr/planningjson.php?promo=$promo&sem=$semaine");
		$jsonRaw = $response->json();

		$tousLesCours = array();
		foreach ($jsonRaw as $day => $lessons) {
			foreach ($lessons as $lesson) {
				list($jour, $mois, $annee) = explode('-', $day);
				list($horaireDebut, $horaireFin) = explode('-', $lesson['Heure']);
				list($heureDebut, $minutesDebut) = explode('h', $horaireDebut);
				list($heureFin, $minutesFin) = explode('h', $horaireFin);

				$tousLesCours[] = array(
					'title' => $lesson['Intitule'].' - '.trim($lesson['Salle']),
					'start' => "$annee-$mois-".$jour."T"."$heureDebut:$minutesDebut:00+00:00",
					'end'   => "$annee-$mois-".$jour."T"."$heureFin:$minutesFin:00+00:00"
				);
			}
		}

		return $tousLesCours;
	}
}