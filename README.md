# Tusk plugin for CakePHP

## Quick Start:

```
composer create-project --prefer-dist cakephp/app myapp
cd myapp
composer require coullc/tusk
cp -aR vendor/coullc/tusk/skeleton/. .
// create Database and set config/app_local.php
bin/cake migrations migrate -p Tusk
```

## Installation

You can install this plugin into your CakePHP application using [composer](https://getcomposer.org).

The recommended way to install composer packages is:

```
composer require coullc/tusk
```

after the Plugin is installed and the Application is connected to the Database, you can run the following in the root of the Application:

```
cp -aR vendor/coullc/tusk/skeleton/. .
bin/cake migrations migrate -p Tusk
```

### Default login

You find the Login under `/tusk`

Email: rhino.example.com

Password: #tusk

---

[mokup](https://xd.adobe.com/view/ee0ba304-8907-40aa-918f-b787c5dc5926-bb58/screen/a86c465f-e104-44b2-aea7-96f0ec6d08a2/specs/)

## ToDos:

#### Next Steps

- [X] Fix Nav
- [ ] Add Field Types
- [ ] Add Media
  - [ ] Add File Chooser
  - [ ] Add Multiselect from Table (with Positioning)
- [ ] Add Widgets
- [ ] Enhance Page overview
- [ ] Extend Layoutmode
- [ ] Add Overview Customasation
  - [ ] PHP Info in Modal
- [ ] Add Table Customasation
- [ ] Rechte und rollen verwaltung erweitern
- [ ] Mehrsprachigkeit
- [ ] Dashboard aufbauen

#### Longterm

- [X] Get Debug to Work
- [X] Fix Authentikation
- [ ] Implement Autherazation
