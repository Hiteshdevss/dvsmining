<div id="sidebar" class="w-64 bg-gray-800 text-white h-full transform -translate-x-full md:translate-x-0 fixed md:relative z-40 flex flex-col">
            <div class="flex flex-col p-4 space-y-8 flex-grow">
                <div class="flex justify-between items-center">
                    <img src="../../Assets/Images/DVS_Logo.png" class="w-36 p-2 ml-0 md:ml-6" alt="DVS Logo">
                    <button class="md:hidden text-white text-2xl" id="close-btn">✖</button>
                </div>
                <nav class="space-y-6 mt-8 flex-grow">
                    <a href="../Pages/dashboard.php" class="block py-2 px-4 hover:bg-orange-600 rounded-lg">Dashboard</a>
                    <div class="relative group">
                        <a href="../Pages/managepost.php" class="block py-2 px-4 hover:bg-orange-600 rounded-lg flex items-center justify-between">
                        Manage Post
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </a>
                        <div class="absolute left-0 mt-2 w-full bg-gray-700 rounded-lg shadow-lg hidden group-hover:block z-20">
                            <a href="../Pages/allpost.php" class="block py-2 px-4 hover:bg-orange-600 rounded-lg">All Post</a>
                            <!-- <a href="#" class="block py-2 px-4 hover:bg-orange-600 rounded-lg">All Blog Post</a>
                            <a href="#" class="block py-2 px-4 hover:bg-orange-600 rounded-lg">All News Post</a> -->
                            <a href="../Pages/createblog.php" class="block py-2 px-4 hover:bg-orange-600 rounded-lg">Create Blog Post</a>
                            <a href="../Pages/createnews.php" class="block py-2 px-4 hover:bg-orange-600 rounded-lg">Create News Post</a>
                        </div>
                    </div>
                    <div class="relative group">
                        <a href="#" class="block py-2 px-4 hover:bg-orange-600 rounded-lg flex items-center justify-between">
                            Enquiry / Suggestion
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </a>
                        <div class="absolute left-0 mt-2 w-full bg-gray-700 rounded-lg shadow-lg hidden group-hover:block">
                            <a href="../Pages/enquriy.php" class="block py-2 px-4 hover:bg-orange-600 rounded-lg">Enquiries</a>
                            <a href="../Pages/suggestion.php" class="block py-2 px-4 hover:bg-orange-600 rounded-lg">Suggestions</a>
                        </div>
                    </div>
                    <a href="../Pages/jobpost.php" class="block py-2 px-4 hover:bg-orange-600 rounded-lg">Post Job</a>
                    <a href="../Pages/managejob.php" class="block py-2 px-4 hover:bg-orange-600 rounded-lg">Manage Applications</a>
                </nav>
            </div>
            <!-- Logout Button -->
            <a href="#" class="block py-2 px-4 hover:bg-red-600 rounded-lg mt-auto mb-4 mx-4 flex">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                </svg>
                Logout
            </a>
        </div>