<?php

interface Renderer {
	static public function render( $app );
}

class jsonRenderer implements Renderer {
	static public function render( $app ) {
		$response = $app->response();
		$response['Content-Type'] = 'application/json';
		$response->body(json_encode( array_shift( array_values( $app->result ) ) ));
	}
}

class htmlRenderer implements Renderer {
	const MAIN_TPL = 'main';
	const TPL_EXT = '.html.php';
	static public function render( $app ) {
		$app->view()->appendData( array(
		                               'base_path' => $app->base_path,
		                               'assets_path' => $app->base_path . 'assets/'
		                          ));
		$app->view()->appendData( $app->result );
		$contents = $app->view()->fetch($app->template_name . self::TPL_EXT);
		$app->render(self::MAIN_TPL . self::TPL_EXT, array('contents' => $contents));
	}
}

/* Loading the route for links (relative to the document) */
$app_env = $app->environment();
$app->base_path = preg_replace('|index.php$|', '', $app_env['SCRIPT_NAME']).'/';


/* Decission on which renderer to use*/
list($app->accept) = explode(',', $app_env['ACCEPT']);
$app->hook('slim.after.router', function () use ($app) {
		switch( $app->accept ) {
			case 'application/json': jsonRenderer::render($app); break;
			default: htmlRenderer::render($app);
		}
	});

/* Run the framework! */
$app->run();
