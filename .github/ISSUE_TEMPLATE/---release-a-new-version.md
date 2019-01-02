---
name: "⚡️ Release a new version"
about: Release a new version
title: "⚡ Release VERSION_NUMBER"
labels: gitflowM
assignees: in4s

---

- [ ] git pull
- [ ] check PSR by running php-cs-fixer
    - [ ] php-cs-fixer fix .
    - [ ] if files was changed
        - [ ] git add .
        - [ ] git commit -m "php-cs-fixed"
- [ ] Fix the current version number in files:
    - [ ] In README.md
    - [ ] In composer.json
    - [ ] In versions.todo
- [ ] git add .
- [ ] git commit -m "Release VERSION_NUMBER"
- [ ] git push origin develop
- [ ] https://github.com/j4s/superglobals/releases/new?tag=VERSION_NUMBER
- [ ] Close milestone with current version name
