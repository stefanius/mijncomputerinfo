clone-dotfiles-vagrant:
  cmd.run:
    - cwd: /home/vagrant/
    - user: vagrant
    - name: '/usr/bin/git clone https://github.com/stefanius/dotfiles.git /home/vagrant/dotfiles'

install-dotfiles-vagrant:
  cmd.run:
    - cwd: /home/vagrant/
    - user: vagrant
    - name: '/bin/bash /home/vagrant/dotfiles/bin/dotfiles'