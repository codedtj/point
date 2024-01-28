# echo-backend

* [Prerequisites](#prerequisites)
* [First launch](#first-launch)
* [Usage](#usage)

## Prerequisites


### Install:
* Docker
* Git

### For Windows:
Launch the PowerShell console as administrator and run the command to allow PowerShell script execution

```shell
Set-ExecutionPolicy RemoteSigned
```

### For Linux and Mac:
Edit your `/etc/hosts` file to include the following:

 ```shell
# Install the downloaded package
sudo dpkg -i powershell-lts_7.3.4-1.deb_amd64.deb

# Resolve missing dependencies and finish the install (if necessary)
sudo apt-get install -f
```

Install PowerShell Core if you are using Mac or Linux
* Command for Mac:

    ```shell
    brew install --cask powershell
    ```

* Command for Linux

   ```shell
  brew install --cask powershell
  ```

Edit your `/etc/hosts` file to include the following:
```shell
  127.0.0.1 point.localhost
```
You can use any text editor you like. If you are using a terminal-based editor like nano, you can open the file with the following command:
```shell
  sudo nano /etc/hosts
```

## First launch

Dot-source (import script function to PowerShell terminal) `run.ps1`

```shell
 . ./run.ps1
```

Run commands for the **first launch**

```shell
 run
```
> It will build the project, run composer install, migrate, and seed commands

## Usage

>Don`t forget to dot-source PowerShell script in the newly created terminal

Docker commands
```shell
 up
 down
 stop
 restart
```

Install composer dependencies

```shell
 vendor
```

Migrate database

```shell
 migrate
```

Seed database

```shell
 migrate
```
