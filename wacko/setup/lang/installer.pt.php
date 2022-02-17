<?php
$lang = [

/*
   Language Settings
*/
'Charset'		=> 'utf-8',
'LangISO'		=> 'pt',
'LangLocale'	=> 'pt_PT',
'LangName'		=> 'Portugues',
'LangDir'		=> 'ltr',

/*
   Config Defaults
*/
'ConfigDefaults'	=> [
	// pages (tag)
	'category_page'		=> 'Categoria',
	'groups_page'		=> 'Grupos',
	'users_page'		=> 'Usuários',

	'search_page'		=> 'Buscar',
	'login_page'		=> 'Entrar',
	'account_page'		=> 'Configurações',
	'registration_page'	=> 'CriarConta',
	'password_page'		=> 'Senha',

	'changes_page'		=> 'AlteraçõesRecentes',
	'comments_page'		=> 'RecentementeComentadas',
	'index_page'		=> 'ÍndicedePáginas',

	'random_page'		=> 'PáginaAleatória',
	#'help_page'			=> 'Help',
	#'terms_page'		=> 'Terms',
	#'privacy_page'		=> 'Privacy',

	// time
	#'date_format'					=> 'd.m.Y',
	#'time_format'					=> 'H:i',
	#'time_format_seconds'			=> 'H:i:s',
],

/*
   Generic Page Text
*/
'Title'							=> 'WackoWiki Instalação',
'Continue'						=> 'Continuar',
'Back'							=> 'Voltar',
'Recommended'					=> 'recomendado',
'InvalidAction'					=> 'Invalid action',

/*
   Language Selection Page
*/
'lang'							=> 'Configuração de idioma',
'PleaseUpgradeToR6'				=> 'Está a correr uma versão antiga (pré %1) do WackoWiki (%1). Para actualizar para esta nova versão do WackoWiki, deve primeiro actualizar a sua instalação para %2.',
'UpgradeFromWacko'				=> 'Bem-vindo a WackoWiki, parece que está a passar de WackoWiki %1 para %2.  As próximas páginas irão guiá-lo através do processo de actualização.',
'FreshInstall'					=> 'Bem-vindo ao WackoWiki, está prestes a instalar o WackoWiki %1.  As próximas páginas irão guiá-lo através do processo de instalação.',
'PleaseBackup'					=> 'Please, <strong>backup</strong> your database, config file and all changed files such as those which have hacks and patches applied to them before starting upgrade process. This can save you from big headache.',
'LangDesc'						=> 'Escolha um idioma para o processo de instalação. Este idioma também será usado como o idioma padrão da sua instalação do WackoWiki.',

/*
   System Requirements Page
*/
'version-check'					=> 'Requisitos de sistema',
'PhpVersion'					=> 'PHP Version',
'PhpDetected'					=> 'Detected PHP',
'ModRewrite'					=> 'Apache Rewrite Extension (Optional)',
'ModRewriteInstalled'			=> 'Rewrite Extension (mod_rewrite) Installed?',
'Database'						=> 'Base de dados',
'PhpExtensions'					=> 'PHP Extensions',
'Permissions'					=> 'Permissões',
'ReadyToInstall'				=> 'Pronto para instalar?',
'Requirements'					=> 'Seu servidor deve atender aos requisitos listados abaixo.',
'OK'							=> 'OK',
'Problem'						=> 'Problema',
'NotePhpExtensions'				=> '',
'ErrorPhpExtensions'			=> 'A sua instalação PHP parece estar a faltar as extensões de PHP assinaladas que são requeridas por WackoWiki.',
'PcreWithoutUtf8'				=> 'O módulo PCRE do PHP parece ter sido compilado sem suporte PCRE_UTF8.',
'NotePermissions'				=> 'This installer will try to write the configuration data to the file %1, located in your WackoWiki directory. In order for this to work, you must make sure the web server has write access to that file.  If you can\'t do this, you will have to edit the file manually (the installer will tell you how).<br><br>See <a href="https://wackowiki.org/doc/Doc/English/Installation" target="_blank">WackoWiki:Doc/English/Installation</a> for details.',
'ErrorPermissions'				=> 'It would appear that the installer cannot automatically set the required file permissions for WackoWiki to work correctly. You will be prompted later in the installation process to manually configure the required file permissions on your server.',
'ErrorMinPhpVersion'			=> 'A Versão PHP deve ser maior que <strong>' . PHP_MIN_VERSION . '</strong>, o seu servidor parece estar a correr uma versão anterior. Tem de actualizar para uma versão mais recente do PHP para que o WackoWiki funcione correctamente.',
'Ready'							=> 'Parabéns, parece que o seu servidor é capaz de executar o WackoWiki. As próximas páginas irão levá-lo através do processo de configuração.',

/*
   Site Config Page
*/
'config-site'					=> 'Configuração do Site',
'SiteName'						=> 'Nome da wiki',
'SiteNameDesc'					=> 'Please enter the name of your Wiki site.',
'SiteNameDefault'				=> 'AMinhaWiki',
'HomePage'						=> 'Home Page',
'HomePageDesc'					=> 'Enter the name you would like your home page to have, this will be the default page users will see when they visit your site and should be a <a href="https://wackowiki.org/doc/Doc/English/WikiName" title="View Help" target="_blank">WikiName</a>.',
'HomePageDefault'				=> 'HomePage',
'MultiLang'						=> 'Multi Language Mode',
'MultiLangDesc'					=> 'O modo multilíngüe permite ter páginas com configurações de idioma diferentes em uma única instalação. Se este modo estiver ativado, o instalador criará itens de menu iniciais para todos os idiomas disponíveis na distribuição.',
'AllowedLang'					=> 'Allowed Languages',
'AllowedLangDesc'				=> 'Recomenda-se que seleccione apenas o conjunto de idiomas que pretende utilizar, caso contrário todos os idiomas são seleccionados.',
'Admin'							=> 'Nome do Administrador',
'AdminDesc'						=> 'Enter the admins username, this should be a <a href="https://wackowiki.org/doc/Doc/English/WikiName" title="View Help" target="_blank">WikiName</a> (e.g. <code>WikiAdmin</code>).',
'NameAlphanumOnly'				=> 'O Nome de Utilizador deve ser constituído por %1 a %2 caracteres e usar somente caracteres alfanuméricos.',
'NameCamelCaseOnly'				=> 'O Nome de Utilizador deve ser constituído por %1 a %2 caracteres e WikiName formatted.',
'Password'						=> 'Senha de Administrador',
'PasswordDesc'					=> 'Escolha uma senha para o administrador com um mínimo de %1 caracteres.',
'PasswordConfirm'				=> 'Repetir Senha:',
'Mail'							=> 'Admin Email Address',
'MailDesc'						=> 'Digite o endereço de e-mail dos administradores.',
'Base'							=> 'Base URL',
'BaseDesc'						=> 'Your WackoWiki site base URL.  Page names get appended to it, so if you are using mod_rewrite the address should end with a forward slash i.e.</p><ul><li><strong><code>https://example.com/</code></strong></li><li><strong><code>https://example.com/wiki/</code></strong></li></ul>',
'Rewrite'						=> 'Rewrite Mode',
'RewriteDesc'					=> 'Rewrite mode should be enabled if you are using WackoWiki with URL rewriting.',
'Enabled'						=> 'Ativado:',
'ErrorAdminEmail'				=> 'Você digitou um endereço de e-mail inválido!',
'ErrorAdminPasswordMismatch'	=> 'As senhas não coincidem!',
'ErrorAdminPasswordShort'		=> 'A senha do administrador é muito curta, o comprimento mínimo é de %1 caracteres!',
'ModRewriteStatusUnknown'		=> 'The installer cannot verify that mod_rewrite is enabled, however this does not mean it is disabled',

/*
   Database Config Page
*/
'config-database'				=> 'Configuração do banco de dados',
'DbDriver'						=> 'Driver',
'DbDriverDesc'					=> 'The database driver you want to use.',
'DbCharset'						=> 'Charset',
'DbCharsetDesc'					=> 'The database charset you want to use.',
'DbEngine'						=> 'Engine',
'DbEngineDesc'					=> 'The database engine you want to use.',
'DbHost'						=> 'Host',
'DbHostDesc'					=> 'The host your database server is running on. Usually <code>127.0.0.1</code> or <code>localhost</code> (ie, the same machine your WackoWiki site is on).',
'DbPort'						=> 'Port (Optional)',
'DbPortDesc'					=> 'O número da porta pela qual o seu servidor de base de dados está acessível, deixe-o em branco para usar o número da porta padrão.',
'DbName'						=> 'Database Name',
'DbNameDesc'					=> 'A base de dados WackoWiki deve ser utilizada. Esta base de dados precisa de existir já depois de continuar!',
'DbUser'						=> 'Nome de utilizador',
'DbUserDesc'					=> 'Nome do utilizador utilizado para se ligar à sua base de dados.',
'DbPassword'					=> 'Palavra-chave',
'DbPasswordDesc'				=> 'Senha do utilizador utilizada para se ligar à sua base de dados.',
'Prefix'						=> 'Table Prefix',
'PrefixDesc'					=> 'Prefix of all tables used by WackoWiki. This allows you to run multiple WackoWiki installations using the same database by configuring them to use different table prefixes (e.g. wacko_).',
'ErrorNoDbDriverDetected'		=> 'Nenhum driver de base de dados foi detectado, por favor active ou a extensão mysqli ou pdo_mysql no seu ficheiro php.ini.',
'ErrorNoDbDriverSelected'		=> 'Não foi seleccionado nenhum condutor de base de dados, por favor escolha um da lista.',
'DeleteTables'					=> 'Eliminar tabelas existentes?',
'DeleteTablesDesc'				=> 'ATENÇÃO! Se proceder com esta opção seleccionada, todos os dados wiki actuais serão apagados da sua base de dados.  Isto não pode ser desfeito a menos que restaure manualmente os dados a partir de uma cópia de segurança.',
'ConfirmTableDeletion'			=> 'Tem a certeza de que quer apagar todas as tabelas wiki actuais?',

/*
   Database Installation Page
*/
'install-database'				=> 'Instalação do banco de dados',
'TestingConfiguration'			=> 'Teste de Configuração',
'TestConnectionString'			=> 'Testar as configurações de conexão do banco de dados',
'TestDatabaseExists'			=> 'Verificar se o banco de dados especificado existe',
'TestDatabaseVersion'			=> 'Verificação dos requisitos mínimos da versão da base de dados',
'InstallTables'					=> 'Instalando Tabelas',
'ErrorDbConnection'				=> 'Houve um problema com os detalhes de ligação à base de dados que especificou, por favor volte atrás e verifique se estão correctos.',
'ErrorDbExists'					=> 'A base de dados que configurou não foi encontrada. Lembre-se, ela precisa existir antes que você possa instalar/atualizar o WackoWiki!',
'ErrorDatabaseVersion'			=> 'A versão da base de dados é %1 mas requer pelo menos %2.',
'To'							=> 'to',
'AlterTable'					=> 'Alterando %1 tabela',
'InsertRecord'					=> 'Inserção do registro na tabela %1',
'RenameTable'					=> 'Renomear tabela %1',
'UpdateTable'					=> 'Atualização da tabela %1',
'InstallDefaultData'			=> 'Adding Default Data',
'InstallPagesBegin'				=> 'Adding Default Pages',
'InstallPagesEnd'				=> 'Finished Adding Default Pages',
'InstallSystemAccount'			=> 'Adding <code>System</code> User',
'InstallDeletedAccount'			=> 'Adding <code>Deleted</code> User',
'InstallAdmin'					=> 'Adding Admin User',
'InstallAdminSetting'			=> 'Adding Admin User Preferences',
'InstallAdminGroup'				=> 'Adding Admins Group',
'InstallAdminGroupMember'		=> 'Adding Admins Group Member',
'InstallEverybodyGroup'			=> 'Adding Everybody Group',
'InstallModeratorGroup'			=> 'Adding Moderator Group',
'InstallReviewerGroup'			=> 'Adding Reviewer Group',
'InstallLogoImage'				=> 'Adding Logo Image',
'LogoImage'						=> 'Logo image',
'InstallConfigValues'			=> 'Adding Config Values',
'ConfigValues'					=> 'Config Values',
'ErrorInsertPage'				=> 'Error inserting %1 page',
'ErrorInsertPagePermission'		=> 'Error setting permission for %1 page',
'ErrorInsertDefaultMenuItem'	=> 'Error setting page %1 as default menu item',
'ErrorPageAlreadyExists'		=> 'The %1 page already exists',
'ErrorAlterTable'				=> 'Error altering %1 table',
'ErrorInsertRecord'				=> 'Error Inserting Record into %1 table',
'ErrorRenameTable'				=> 'Error renaming %1 table',
'ErrorUpdatingTable'			=> 'Error updating %1 table',
'CreatingTable'					=> 'Creating %1 table',
'ErrorAlreadyExists'			=> 'The %1 already exists',
'ErrorCreatingTable'			=> 'Error creating %1 table, does it already exist?',
'DeletingTables'				=> 'Excluindo Tabelas',
'DeletingTablesEnd'				=> 'Finished Deleting Tables',
'ErrorDeletingTable'			=> 'Error deleting %1 table, the most likely reason is that the table does not exist in which case you can ignore this warning.',
'DeletingTable'					=> 'Deleting %1 table',

/*
   Write Config Page
*/
'write-config'					=> 'Escrever ficheiro de configuração',
'FinalStep'						=> 'Passo final',
'Writing'						=> 'Writing Configuration File',
'RemovingWritePrivilege'		=> 'Removing Write Privilege',
'InstallationComplete'			=> 'Instalação completa',
'ThatsAll'						=> 'E é tudo! Pode agora <a href="%1">ver o seu site WackoWiki</a>.',
'SecurityConsiderations'		=> 'Considerações de segurança',
'SecurityRisk'					=> 'You are advised to remove write access to %1 again now that it\'s been written. Leaving the file writable can be a security risk!<br>i.e. %2',
'RemoveSetupDirectory'			=> 'You should delete the %1 directory now that the installation process has been completed.',
'ErrorGivePrivileges'			=> 'The configuration file %1 could not be written. You will need to give your web server temporary write access to either your WackoWiki directory, or a blank file called %1<br>%2<br>; don\'t forget to remove write access again later, i.e. %3.<br>If, for any reason, you can\'t do this, you\'ll have to copy the text below into a new file and save/upload it as %1 into the WackoWiki directory. Once you\'ve done this, your WackoWiki site should work. If not, please visit <a href="https://wackowiki.org/doc/Doc/English/Installation" target="_blank">WackoWiki:Doc/English/Installation</a>',
'NextStep'						=> 'In the next step, the installer will try to write the updated configuration file, %1.  Please make sure the web server has write access to the file, or you will have to edit it manually.  Once again, see  <a href="https://wackowiki.org/doc/Doc/English/Installation" target="_blank">WackoWiki:Doc/English/Installation</a> for details.',
'WrittenAt'						=> 'written at ',
'DontChange'					=> 'do not change wacko_version manually!',
'ConfigDescription'				=> 'detailed description https://wackowiki.org/doc/Doc/English/Configuration',
'TryAgain'						=> 'Tente novamente',

];
