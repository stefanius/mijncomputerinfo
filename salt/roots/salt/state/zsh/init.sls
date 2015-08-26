#!stateconf yaml . jinja

# Dependencies

.git:
  pkg:
    - installed

# Install ZShell

.zsh:
  pkg:
    - installed

# Set ZSH as default shell

.default_shell:
  cmd:
    - run
    - name: "chsh -s /usr/bin/zsh vagrant"
    - unless: "grep -E '^vagrant.+:/usr/bin/zsh$' /etc/passwd"
    - require:
      - pkg: .zsh
