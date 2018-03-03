## Features
- Configure the server using the **Docker**.
- Developing application using **Laravel 5.6**.
- Creating unit-tests using **PHPUnit**.
- Resolve problems using the **design patterns (such as FactoryMethod)**.
- Developing the application using  **TDD** method.

### Run the docker
 In the root of the directory run below command:
```sh
$ [sudo] ./sync up
```
This command setup all server requirements.
Now, nginx,mysql and phpmyAdmin are running.

## Run the App
- Open your browser and :
    visit application : **http://localhost:8080**
    visit phpMyAdmin  : **http://localhost:8184**
## Enter to workspace bash container
- Run this command:
```sh
$ ./sync bash
```
- After arrival to bash run this command:
```sh
$ root@5feeba100da: php artisan migrate
```
- And run the unit-tests:
```sh
$ root@5feeba100da: ./vendor/bin/phpunit
```
**Best Regard,**
Mohammad fouladgar 