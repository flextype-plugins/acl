<a name="1.1.0"></a>
# [1.1.0](https://github.com/flextype-plugins/acl) (2020-06-23)

General code update and refactoring with a breaking changes

### Features

* **middlewares**: add new middleware AclIsUserLoggedInEmailInMiddleware
* **middlewares**: add new middleware AclIsUserLoggedInUuidtInMiddleware
* **middlewares**: add new middleware AclIsUserLoggedInRolesInMiddleware
* **middlewares**: add new middleware AclIsUserLoggedInMiddleware
* **middlewares**: add new middleware AclIsUserLoggedInEmailNotInMiddleware
* **middlewares**: add new middleware AclIsUserLoggedInUuidNotInMiddleware
* **middlewares**: add new middleware AclIsUserLoggedInRolesNotInMiddleware
* **middlewares**: add new middleware AclIsUserNotLoggedInMiddleware

* **acl**: add new method isUserLoggedInRolesIn()
* **acl**: add new method isUserLoggedInEmailIn()
* **acl**: add new method isUserLoggedInUuidIn()
* **acl**: add new method getUserLoggedInEmail()
* **acl**: add new method getUserLoggedInRoles()
* **acl**: add new method getUserLoggedInUuid()
* **acl**: add new method setUserLoggedIn(bool $logged_in)
* **acl**: add new method setUserLoggedInUuid(string $uuid)
* **acl**: add new method setUserLoggedInEmail(string $email)
* **acl**: add new method setUserLoggedInRoles(string $roles)

and a lot of more, read README.MD

<a name="1.0.0"></a>
# [1.0.0](https://github.com/flextype-plugins/acl) (2020-06-21)
* Initial Release
