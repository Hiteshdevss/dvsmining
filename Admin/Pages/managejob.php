<?php
// Database connection
$servername = "localhost";
$username = "u345348146_DVSMining";
$password = "Hitesh1100@";
$dbname = "u345348146_DVSMining";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ensure 'status' column exists in the 'applications' table
$conn->query("ALTER TABLE applications ADD COLUMN IF NOT EXISTS status VARCHAR(20) DEFAULT 'New'");

// Search functionality
$search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';
$where = '';
if (!empty($search)) {
    $where = "WHERE name LIKE '%$search%' OR email LIKE '%$search%' OR phone LIKE '%$search%'";
}

// Fetch applications - removed join with jobs table
$sql = "SELECT * FROM applications $where ORDER BY applied_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application list - Dvsmining</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        #sidebar { transition: transform 0.3s ease-in-out; }
        .modal {
            display: none;
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 50;
        }
        .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            width: 90%;
            max-width: 600px;
        }
        .close {
            float: right;
            font-size: 20px;
            cursor: pointer;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen overflow-hidden">
        <!-- Slim Sidebar -->
        <?php include '../Inc/sidebar.php'; ?>
       
        <div class="flex-1 w-full h-full overflow-hidden overflow-y-auto">
            <!-- Navbar -->
            <?php include '../Inc/navbar.php'; ?>

            <!-- Form Content -->
            <main class="flex-1 p-6">
                <div class="flex flex-col md:flex-row justify-between items-center mb-6">
                    <h2 class="text-xl font-semibold mb-4 md:mb-0">List of Job Applications</h2>
                    <form method="GET" class="flex w-full md:w-auto">
                        <input type="text" name="search" class="border border-gray-300 rounded-l-lg p-2 w-full md:w-64" 
                               placeholder="Search..." value="<?php echo htmlspecialchars($search); ?>">
                        <button type="submit" class="bg-orange-600 text-white px-4 py-2 rounded-r-lg">Search</button>
                    </form>
                </div>

                <!-- Analytics section -->
                <?php include '../template/jobanaytics.php'; ?>

                <!-- Applications Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white rounded-lg shadow-md">
                        <thead>
                            <tr class="bg-orange-600 text-white">
                                <th class="py-3 px-6 text-left">Name</th>
                                <th class="py-3 px-6 text-left">Applied Date</th>
                                <th class="py-3 px-6 text-left">Email</th>
                                <th class="py-3 px-6 text-left">Phone</th>
                                <th class="py-3 px-6 text-left">Resume</th>
                                <th class="py-3 px-6 text-left">Status</th>
                                <th class="py-3 px-6 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if ($result && $result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    $applied_date = date('M d, Y', strtotime($row['applied_at']));
                            ?>
                            <tr class="border-b">
                                <td class="py-4 px-6"><?php echo htmlspecialchars($row['name']); ?></td>
                                <td class="py-4 px-6"><?php echo $applied_date; ?></td>
                                <td class="py-4 px-6"><?php echo htmlspecialchars($row['email']); ?></td>
                                <td class="py-4 px-6"><?php echo htmlspecialchars($row['phone'] ?? 'N/A'); ?></td>
                                
                                <td class="py-4 px-6">
                                    <?php if (!empty($row['resume_path'])): ?>
                                    <a href="<?php echo htmlspecialchars($row['resume_path']); ?>" 
                                    class="text-blue-500 hover:underline" target="_blank" download>
                                        Download Resume
                                    </a>
                                    <?php else: ?>
                                    <span class="text-gray-500">No resume</span>
                                    <?php endif; ?>
                                </td>
                                <td class="py-4 px-6">
                                    <select class="status-dropdown bg-cyan-200 text-cyan-800 py-1 px-3 rounded-full text-xs" 
                                            data-id="<?php echo $row['id']; ?>">
                                        <option value="New" <?php echo $row['status'] == 'New' ? 'selected' : ''; ?>>New</option>
                                        <option value="Visited" <?php echo $row['status'] == 'Visited' ? 'selected' : ''; ?>>Visited</option>
                                    </select>
                                </td>
                                <td class="py-4 px-6 flex md:flex-row flex-col md:space-y-0 space-y-2 items-center justify-start md:space-x-2">
                                <button class="bg-orange-500 text-white px-3 py-1 rounded-lg hover:bg-orange-600 view-details"
                                        data-id="<?php echo $row['id']; ?>"
                                        data-name="<?php echo htmlspecialchars($row['name']); ?>"
                                        data-email="<?php echo htmlspecialchars($row['email']); ?>"
                                        data-phone="<?php echo htmlspecialchars($row['phone'] ?? 'N/A'); ?>"
                                        data-status="<?php echo htmlspecialchars($row['status']); ?>"
                                        data-date="<?php echo $applied_date; ?>">
                                    View
                                </button>
                                    <button class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600 delete-application flex"
                                            data-id="<?php echo $row['id']; ?>">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                            <?php 
                                }
                            } else {
                                echo "<tr><td colspan='7' class='py-4 px-6 text-center'>No applications found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </main>

            <!-- Modal -->
            <div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeModal">&times;</span>
        <h2 class="text-xl font-semibold mb-4">Application Details</h2>
        <p><strong>Name:</strong> <span id="modal-name"></span></p>
        <p><strong>Email:</strong> <span id="modal-email"></span></p>
        <p><strong>Phone:</strong> <span id="modal-phone"></span></p>
        <p><strong>Applied Date:</strong> <span id="modal-date"></span></p>
        <p>
            <strong>Status:</strong> 
            <select id="modal-status-dropdown" class="bg-cyan-200 text-cyan-800 py-1 px-3 rounded-full text-xs">
                <option value="New">New</option>
                <option class="bg-orange-600 text-white py-1 px-3 rounded-full text-xs" value="Visited">Visited</option>
            </select>
        </p>
        <button id="update-status-btn" class="bg-orange-600 text-white px-4 py-2 mt-4 rounded-lg">Update Status</button>
    </div>
</div>




        </div>
    </div>

    <script>
    $(document).ready(function() {
        let currentApplicationId; // Variable to store the current application ID

        // Toggle sidebar visibility
        $('#menu-toggle').click(function() {
            $('#sidebar').toggleClass('-translate-x-full');
        });

        $('#close-btn').click(function() {
            $('#sidebar').addClass('-translate-x-full');
        });

        // Open modal with application details
        $('.view-details').click(function() {
            $('#modal-name').text($(this).data('name'));
            $('#modal-email').text($(this).data('email'));
            $('#modal-phone').text($(this).data('phone'));
            $('#modal-date').text($(this).data('date'));
            
            currentApplicationId = $(this).data('id'); // Capture the application ID for modal updates
            $('#modal-status-dropdown').val($(this).data('status'));
            
            $('#myModal').fadeIn().css('display', 'flex');
        });

        // Handle modal status change and update database
        $('#update-status-btn').click(function() {
            const newStatus = $('#modal-status-dropdown').val();
            $.ajax({
                url: 'update_status.php',
                type: 'POST',
                data: { id: currentApplicationId, status: newStatus },
                success: function(response) {
                    alert('Status updated successfully!');
                    $(`.status-dropdown[data-id='${currentApplicationId}']`).val(newStatus); // Update table dropdown
                    $(`.view-details[data-id='${currentApplicationId}']`).data('status', newStatus); // Update modal status
                    $('#myModal').fadeOut();
                },
                error: function() {
                    alert('Failed to update status.');
                }
            });
        });

        // Handle status dropdown change in table
        $('.status-dropdown').change(function() {
            const status = $(this).val();
            const applicationId = $(this).data('id');
            $.ajax({
                url: 'update_status.php',
                type: 'POST',
                data: { id: applicationId, status: status },
                success: function(response) {
                    alert('Status updated successfully!');
                    $(`.view-details[data-id='${applicationId}']`).data('status', status); // Sync modal status
                },
                error: function() {
                    alert('Failed to update status.');
                }
            });
        });

        // Close modal
        $('#closeModal').click(function() {
            $('#myModal').fadeOut();
        });

        // Close modal when clicking outside
        $(window).click(function(event) {
            if ($(event.target).is('#myModal')) {
                $('#myModal').fadeOut();
            }
        });

        // Delete application
        // $('.delete-application').click(function() {
        //     if (confirm('Are you sure you want to delete this application?')) {
        //         const id = $(this).data('id');
        //         $.ajax({
        //             url: 'delete_application.php',
        //             type: 'POST',
        //             data: { id: id },
        //             success: function(response) {
        //                 alert('Application deleted successfully!');
        //                 location.reload();
        //             },
        //             error: function() {
        //                 alert('Failed to delete application.');
        //             }
        //         });
        //     }
        // });

        $('.delete-application').click(function() {
    if (confirm('Are you sure you want to delete this application?')) {
        const id = $(this).data('id');
        $.ajax({
            url: 'delete_application.php',
            type: 'POST',
            data: { id: id },
            success: function(response) {
                if (response.trim() === "Success") {
                    alert('Application deleted successfully!');
                    location.reload();
                } else {
                    alert('Error: ' + response);
                }
            },
            error: function(xhr, status, error) {
                alert('Failed to delete application. Error: ' + error);
            }
        });
    }
});

    });
</script>

</body>
</html>
