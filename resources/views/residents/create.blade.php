<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">

        <title>Add a New Resident</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    </head>
    <body class="bg-blue-lightest">
        <div class="container p-4 mx-auto">
            <div class="title text-5xl leading-loose tracking-tight text-blue-darker m-3">
                Add a New Resident
            </div>
            <form name="create-resident" class="p-4 pb-16 bg-white w-100 border border-grey-light shadow shadow-lg rounded">
                <div class="block uppercase tracking-wide text-grey-darker text-lg font-bold mb-2">Student Info</div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="first_name">
                            First Name
                        </label>
                        <input name="first_name" required aria-required="true" type="text" maxlength="50" placeholder="Jane" class="appearance-none block w-full bg-grey-lighter text-grey-darkest border border-grey-light rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-blue-light">
                        <p class="hidden text-red text-xs italic"></p>
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-grey-darkest text-xs font-bold mb-2" for="last_name">
                            Last Name
                        </label>
                        <input name="last_name" required aria-required="true" type="text" maxlength="50" placeholder="Doe" class="appearance-none block w-full bg-grey-lighter text-grey-darkest border border-grey-light rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-blue-light">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darkest text-xs font-bold mb-2" for="gender">
                            Gender
                        </label>
                        <div class="relative">
                            <select name="gender" required aria-required="true" class="block appearance-none w-full bg-grey-lighter border border-grey-light text-grey-darkest py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-blue-light">
                                <option>Choose one...</option>
                                <option value="F">Female</option>
                                <option value="M">Male</option>
                            </select>
                            <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darkest">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darkest text-xs font-bold mb-2" for="birth_date">
                            Date of Birth
                        </label>
                        <input name="birth_date" maxlength="50" type="date" placeholder="12/22/1997" class="appearance-none block w-full bg-grey-lighter text-grey-darkest border border-grey-light rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-blue-light">
                    </div>
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darkest text-xs font-bold mb-2" for="student_id">
                            Student ID
                        </label>
                        <input name="student_id" maxlength="50" type="text" placeholder="JD-8513789" class="appearance-none block w-full bg-grey-lighter text-grey-darkest border border-grey-light rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-blue-light">
                    </div>
                </div>

                <div class="block uppercase tracking-wide text-grey-darker text-lg font-bold mb-2 mt-8">Address Info</div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="address1">
                            Address 1
                        </label>
                        <input name="address1" type="text" maxlength="100" placeholder="200 Woodstock Lane" class="appearance-none block w-full bg-grey-lighter text-grey-darkest border border-grey-light rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-blue-light">
                        <p class="hidden text-red text-xs italic"></p>
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="address2">
                            Address 2
                        </label>
                        <input name="address2" type="text" maxlength="100" placeholder="Unit 3F" class="appearance-none block w-full bg-grey-lighter text-grey-darkest border border-grey-light rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-blue-light">
                        <p class="hidden text-red text-xs italic"></p>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-2">
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darkest text-xs font-bold mb-2" for="city">
                            City
                        </label>
                        <input name="city" type="text" maxlength="50" placeholder="Albuquerque" class="appearance-none block w-full bg-grey-lighter text-grey-darkest border border-grey-light rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-blue-light">
                    </div>
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darkest text-xs font-bold mb-2" for="state">
                            State
                        </label>
                        <div class="relative">
                            <select name="state" class="block appearance-none w-full bg-grey-lighter border border-grey-light text-grey-darkest py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-blue-light">
                                <option>Select one...</option>
                                @foreach(config('states') as $stateAbbr => $stateName)
                                    <option value="{{$stateAbbr}}">{{$stateName}}</option>
                                @endforeach
                            </select>
                            <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darkest">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darkest text-xs font-bold mb-2" for="zip">
                            Zip
                        </label>
                        <input name="zip" type="text" placeholder="90210" maxlength="18" class="appearance-none block w-full bg-grey-lighter text-grey-darkest border border-grey-light rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-blue-light">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-2">
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darkest text-xs font-bold mb-2" for="phone">
                            Phone Number
                        </label>
                        <input name="phone" type="tel" placeholder="757-867-5309" maxlength="18" class="appearance-none block w-full bg-grey-lighter text-grey-darkest border border-grey-light rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-blue-light">
                    </div>
                </div>


                <div class="block float-right mb-16">
                    <button type="submit" class="float-right bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 mb-6 rounded uppercase">Save</button>
                </div>
            </form>
        </div>
    </body>
</html>
