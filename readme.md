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


## Download dependencies:
1) `composer install`
2) `npm install`

## Seed Database
Assuming you are serving the application via Homestead as described above
1) SSH into your Homestead box.
2) cd into the project's directory
3) run the command `php artisan migrate --seed`
4) This will setup your database tables and add sample data:
   * 2 Buildings
   * 32 Units per Building (4 per floor)
   * 128 Rooms (4 per Unit)
   * 256 Beds (2 per Room)
   * A handful of Residents


### Usage:
* To see a list of Residents: `/residents`
* To Add a User: Click Add Resident on the Resident List page
   * Fill out the form and click Save
* To Edit a Resident, click on any row on the Resident List 
  * Aside from Editing Resident info, you may click `Remove Housing Assignment?` to unassign a user from their assigned Bed
  * If the Unit no longer has any Residents in any Room/Bed, it will remove the `gender` from the Unit 
