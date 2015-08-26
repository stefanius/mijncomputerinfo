vagrant:
  'servertype:vagrantbox':
     - match: grain
     - git
     - apache2
     - mysql
     - php
     - php.fpm
     - php.curl
     - php.json
     - php.mysql
     - nginx
     - afterscripts.symlink_nginx
     - composer
     - zsh
     - dotfiles