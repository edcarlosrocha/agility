<?php

namespace App\Services;

use GuzzleHttp\Client;

class UserService
{
	public static function index()
	{
		$response = (new Client)->request('GET', 'https://eagle-backend-staging.devops.somosagility.com.br/getTeste');
		$data     = json_decode($response->getBody());
		$users    = collect($data->user)->sortBy('customer');
		return $users;
	}

	public static function filter(string $filter)
	{
		$users = collect(static::index())->map(function ($item, $key) use ($filter) {
			if (strpos($item->name, $filter) !== FALSE || strpos($item->customer, $filter) !== FALSE || strpos($item->email, $filter) !== FALSE) {
				return $item;
			}

			unset($item);
		})->whereNotNull();

		return $users;
	}
}