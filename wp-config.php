<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'wordpress' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ':XjUyxo6ec0.)vDgs*RVAX+H Mu?|t(tXJ@{{KTGSa/?0TjRU~g.,Orj3MQ;s1T<' );
define( 'SECURE_AUTH_KEY',  '}GSV3x`1,ehJ:3#`3n_[bnmdZx]#1U)aAnpac:g_kYY-f8T-0nrv3rX^ [Az`(6l' );
define( 'LOGGED_IN_KEY',    '7] Pv^QHOqVtGu@W{pq!2g=tzD^dBRFV-9}%CWw kHVbMi4^=7Dieb5q-CWF]I5*' );
define( 'NONCE_KEY',        '[C8Bj!jm$nd)3.c0hg?Shv`u$?yHE]hgY{+zw@cLt:dzK@JlhxEi70VO}]2~~M/V' );
define( 'AUTH_SALT',        '0{q6MM1iP%9iPrs3ZIurhu?aP9NxAtKKI#/Js.^Rdk$i7G3MBl-o;pAYhj.*Xt:F' );
define( 'SECURE_AUTH_SALT', '%_;{9F^:qzJhM=,Gn.g4gFGhbCWA^Wqj&s|g-^l`.^[_{z&tS&[0yEuE*E;&:QyE' );
define( 'LOGGED_IN_SALT',   '~r/OT:%ZZ},IVIYXgq8DZ!+u6?irA7@^W9zdXBiEeF3 Fih2[AjDJH??,8!`R]vk' );
define( 'NONCE_SALT',       ':~i#Ox0h8bYtNiO~8nGYG0!FcSTm`&gSYndHk@gI9a*E=5wXFTzM1x9eR5BR2t8t' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
