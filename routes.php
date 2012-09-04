<?php

/* Basic route for main access, redirecting to /user */
$app->get('/', function () use ($app) {
		$app->response()->redirect('./user', 301);
	});

/* Users list */
$app->get('/user', function () use ($app, $db) {
		$users_mongo = iterator_to_array( $db->user->find()->sort(array('username' => 1)) );
		$users = array();
		foreach($users_mongo as $i=>$u) {
			$badges = array();
			if( isset($u['badges']) ){
				foreach($u['badges'] as $i=>$badge_ref) {
					$badge = $db->getDBRef($badge_ref);
					$badges[] = array('name' => $badge['name'], 'description' => $badge['description']);
				}
			}
			$username = isset($u['username']) ? $u['username'] : '';
			$users[] = array('username'=> $username, 'badges' => $badges);
		}
		$app->result = array( 'users' => $users );
		$app->template_name = 'users';
	});

/* One user badges */
$app->get('/user/:username', function ($username) use ($app, $db) {
		$u = $db->user->findOne( array( 'username' => $username ) );
		$user = array('username' => $u['username']);
		$user['badges'] = array();
		if( isset($u['badges']) ){
			foreach($u['badges'] as $i=>$badge_ref) {
				$badge = $db->getDBRef($badge_ref);
				$user['badges'][$i] = array('name' => $badge['name'], 'description' => $badge['description']);
			}
		}
		$app->result = array( 'user' => $user );
		$app->template_name = 'user';
	})->conditions(array('username' => '[[:alnum:]-_ .~]+'));

/* Badges list */
$app->get('/badge', function () use ($app, $db) {
		$badges = iterator_to_array( $db->badge->find()->sort(array('name' => 1)) );
		$app->result = array( 'badges' => $badges );
		$app->template_name = 'badges';
	});

/* One badge page */
$app->get('/badge/:badge_name', function ($badge_name) use ($app, $db) {
		$badge = $db->badge->findOne( array( 'name' => $badge_name ) );
		$users = iterator_to_array( $db->user->find( array( 'badges.$id' => $badge['_id'] ) ) );
		$app->result = array( 'badge' => $badge, 'users' => $users );
		$app->template_name = 'badge';
	})->conditions(array('name' => '[[:alnum:]-_ .~]+'));
