<h1 align="center">ACL Plugin for <a href="http://flextype.org/">Flextype</a></h1>

<p align="center">
<a href="https://github.com/flextype-plugins/acl/releases"><img alt="Version" src="https://img.shields.io/github/release/flextype-plugins/acl.svg?label=version&color=black"></a> <a href="https://github.com/flextype-plugins/acl"><img src="https://img.shields.io/badge/license-MIT-blue.svg?color=black" alt="License"></a> <a href="https://github.com/flextype-plugins/acl"><img src="https://img.shields.io/github/downloads/flextype-plugins/acl/total.svg?color=black" alt="Total downloads"></a> <a href="https://github.com/flextype/flextype"><img src="https://img.shields.io/badge/Flextype-0.9.8-green.svg" alt="Flextype"></a> <a href=""><img src="https://img.shields.io/discord/423097982498635778.svg?logo=discord&color=black&label=Discord%20Chat" alt="Discord"></a>
</p>

## Features

* Simple and Flexible ACL(Access Control List) functionality for any entries or any specific data.
* Built in Shortcodes and Twig functions to restrict access for specific users in the entries content and templates.  

## Dependencies

The following dependencies need to be downloaded and installed for ACL Plugin.

| Item | Version | Download |
|---|---|---|
| [flextype](https://github.com/flextype/flextype) | 0.9.8 | [download](https://github.com/flextype/flextype/releases) |
| [site](https://github.com/flextype-plugins/site) | >=1.0.0 | [download](https://github.com/flextype-plugins/site/releases) |
| [twig](https://github.com/flextype-plugins/twig) | >=1.0.0 | [download](https://github.com/flextype-plugins/twig/releases) |

## Installation

1. Download & Install all required dependencies.
2. Create new folder `/project/plugins/acl`
3. Download ACL Plugin and unzip plugin content to the folder `/project/plugins/acl`

## Documentation

### Settings

| Key | Value | Description |
|---|---|---|
| enabled | true | true or false to disable the plugin |
| priority | 95 | accounts plugin priority |

### Session Variables

| Name | Description |
|---|---|
| account_is_user_logged_in | true or false |
| account_username | Logged in username |
| account_roles | Looged in user roles |
| account_uuid | Logged in user uuid |

### Middlewares

#### Name
`AclAccountIsUserLoggedInMiddleware`

#### Paramaters
| Name | Description |
|---|---|
| container | Flextype container |
| redirect | Route name to redirect if user is not logged in |

#### Example
```
$app->get('/my-route', 'MyController:method()')
     ->setName('my.route.name')
     ->add(new AclAccountIsUserLoggedInMiddleware(['container' => $flextype,
                                                   'redirect' => 'another.route.name']));
```

#### Name
`AclAccountsIsUserLoggedInRolesOneOfMiddleware`

#### Paramaters
| Name | Description |
|---|---|
| container | Flextype container |
| roles | Roles separated by comma. |
| redirect | Route name to redirect if not equal |

#### Example
```
$app->get('/my-route', 'MyController:method()')
     ->setName('my.route.name')
     ->add(new AclAccountsIsUserLoggedInRolesOneOfMiddleware(['container' => $flextype,
                                                              'roles' => 'admin, moderator'
                                                              'redirect' => 'another.route.name']));
```

#### Name
`AclAccountsIsUserLoggedInUsernameOneOfMiddleware`

#### Paramaters
| Name | Description |
|---|---|
| container | Flextype container |
| usernames | Userames separated by comma. |
| redirect | Route name to redirect if not equal |

#### Example
```
$app->get('/my-route', 'MyController:method()')
     ->setName('my.route.name')
     ->add(new AclAccountsIsUserLoggedInUsernameOneOfMiddleware(['container' => $flextype,
                                                              'usernames' => 'jack, sam'
                                                              'redirect' => 'another.route.name']));
```

#### Name
`AclAccountsIsUserLoggedInUuidOneOfMiddleware`

#### Paramaters
| Name | Description |
|---|---|
| container | Flextype container |
| uuids | Userames separated by comma. |
| redirect | Route name to redirect if not equal |

#### Example
```
$app->get('/my-route', 'MyController:method()')
     ->setName('my.route.name')
     ->add(new AclAccountsIsUserLoggedInUsernameOneOfMiddleware(['container' => $flextype,
                                                              'uuids' => 'ea7432a3-b2d5-4b04-b31d-1c5acc7a55e2, d549af27-79a0-44f2-b9b1-e82b47bf87e2'
                                                              'redirect' => 'another.route.name']));
```

### Restrict access in the entries frontmatter

You may restrict access for specific users to your entry(entries) in the entry(entries) frontmatter.

`/project/entries/lessons/lesson-42.md`

```
---
title: Lesson 42
acl:
  accounts:
    roles: student, admin
    usernames: jack, sam
    uuids: ea7432a3-b2d5-4b04-b31d-1c5acc7a55e2, d549af27-79a0-44f2-b9b1-e82b47bf87e2
---
Lesson content is here...
```

### Restrict access in the entries content and in any other entry custom field.

You may restrict access for specific users to your specific content inside the entry by using shortcodes.

#### Show private content for logged in users

`/project/entries/lessons/lesson-42.md`

```
---
title: Lesson 42
---
Public text here...

[userLoggedIn]
    Lesson content is here...
[/userLoggedIn]
```

#### Show private content for users with roles: admin and student

`/project/entries/lessons/lesson-42.md`

```
---
title: Lesson 42
---
Public text here...

[userLoggedInRolesOneOf roles="admin, student"]
    Private content here..
[/userLoggedInRolesOneOf]
```

#### Show private content for users with uuids ea7432a3-b2d5-4b04-b31d-1c5acc7a55e2 and d549af27-79a0-44f2-b9b1-e82b47bf87e2

`/project/entries/lessons/lesson-42.md`

```
---
title: Lesson 42
---
Public text here...

[userLoggedInUuidOneOf uuids="ea7432a3-b2d5-4b04-b31d-1c5acc7a55e2, d549af27-79a0-44f2-b9b1-e82b47bf87e2"]
    Private content here..
[/userLoggedInUuidOneOf]
```

#### Show private content for users with usernames jack, sam

`/project/entries/lessons/lesson-42.md`

```
---
title: Lesson 42
---
Public text here...

[userLoggedInUsernameOneOf usernames="jack, sam"]
    Private content here..
[/userLoggedInUsernameOneOf]
```

#### Show logged in username

`/project/entries/lessons/lesson-42.md`

```
---
title: Lesson 42
---

Hello [userLoggedInUsername]
```

#### Show logged in uuid

`/project/entries/lessons/lesson-42.md`

```
---
title: Lesson 42
---

Hello [userLoggedInUsername], your uuid: [userLoggedInUuid]
```

#### Show logged in roles

`/project/entries/lessons/lesson-42.md`

```
---
title: Lesson 42
---

Hello [userLoggedInUsername], your uuid: [userLoggedInUuid] and your roles: [userLoggedInRole]
```

#### Also you may use any of this shortcodes inside any entry fields:

Example:

`/project/entries/lessons/lesson-42.md`

```
---
title: [userLoggedIn][userLoggedInUsername] - [/userLoggedIn]Lesson 42
---
Public text here...

[userLoggedIn]
    Private content here..
[/userLoggedIn]
```

### Restrict access in the TWIG Templates

You may restrict access for specific users to your specific content inside the TWIG Templates.

#### Show private content for logged in users

```
{% if accounts.isUserLoggedIn() %}
    Private content here..
{% endif %}
```

#### Show private content for users with roles: admin and student

```
{% if accounts.isUserLoggedInRolesOneOf('admin, student') %}
    Private content here..
{% endif %}
```

#### Show private content for users with uuids ea7432a3-b2d5-4b04-b31d-1c5acc7a55e2 and d549af27-79a0-44f2-b9b1-e82b47bf87e2

```
{% if accounts.isUserLoggedInUuidOneOf('ea7432a3-b2d5-4b04-b31d-1c5acc7a55e2, d549af27-79a0-44f2-b9b1-e82b47bf87e2') %}
    Private content here..
{% endif %}
```

#### Show private content for users with usernames jack, sam

```
{% if accounts.isUserLoggedInUsernameOneOf('jack, sam') %}
    Private content here..
{% endif %}
```

#### Show logged in username

```
Hello {{ accounts.getUserLoggedInUsername() }}
```

#### Show logged in uuid

```
Hello {{ accounts.getUserLoggedInUsername() }},
your uuid: {{ accounts.getUserLoggedInUuid() }}
```

#### Show logged in roles

```
Hello {{ accounts.getUserLoggedInUsername() }},
your uuid: {{ accounts.getUserLoggedInUuid() }}
and your roles: {{ accounts.getUserLoggedInRoles() }}
```

### Restrict access in the PHP

You may restrict access for specific users to your specific code in the PHP.

#### Run private code for logged in users

```php
if ($flextype->acl->isUserLoggedIn()) {
    // Private code here..
}
```

#### Run private content for users with roles: admin and student

```php
if ($flextype->acl->isUserLoggedInRolesOneOf('admin, student')) {
    // Private code here..
}
```

#### Run private code for users with uuids ea7432a3-b2d5-4b04-b31d-1c5acc7a55e2 and d549af27-79a0-44f2-b9b1-e82b47bf87e2

```php
if ($flextype->acl->isUserLoggedInUuidOneOf('ea7432a3-b2d5-4b04-b31d-1c5acc7a55e2, d549af27-79a0-44f2-b9b1-e82b47bf87e2') {
    // Private content here..
}
```

#### Run private code for users with usernames jack, sam

```php
if ($flextype->acl->isUserLoggedInUsernameOneOf('jack, sam')) {
    // Private content here..
}
```

#### Show logged in username

```php
echo 'Hello ' . $flextype->acl->getUserLoggedInUsername();
```

#### Show logged in uuid

```php
echo 'Hello ' . $flextype->acl->getUserLoggedInUsername();
echo 'your uuid: ' . $flextype->acl->getUserLoggedInUuid();
```

#### Show logged in roles

```php
echo 'Hello ' . $flextype->acl->getUserLoggedInUsername();
echo 'your uuid: ' . $flextype->acl->getUserLoggedInUuid();
echo 'and your roles: ' . $flextype->acl->getUserLoggedInRoles();
```

## LICENSE
[The MIT License (MIT)](https://github.com/flextype-plugins/acl/blob/master/LICENSE.txt)
Copyright (c) 2020 [Sergey Romanenko](https://github.com/Awilum)
