## About Dorm Manager

### Installation
I am running this Application using Laravel Homestead. 

Use the installation instructions found here to get Homestead setup: https://laravel.com/docs/5.7/homestead#installation-and-setup

These are the steps I use.
1) Download and Install VirtualBox
2) Download and Install Vagrant
3) Add the laravel/homestead box to your Vagrant Installation by typing `vagrant box add laravel/homestead`
4) Clone the Homestead repository: `git clone https://github.com/laravel/homestead.git ~/Homestead`
5) Checkout a stable version: `cd ~/Homestead && git checkout v8.0.1`
6) Run the init.sh file: `bash init.sh`
7) To Configure for your specific environment, follow the instructions under "Configuring Homestead" in the laravel documentation:
https://laravel.com/docs/5.7/homestead#installation-and-setup 
