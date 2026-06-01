<?php
session_start();

if(!isset($_SESSION["admin_logged_in"])){
    header("Location: admin-login.php");
    exit();
}

function ListAllFeedBacks(){

    $allFeedbacks=array();

    $fileHandler=fopen("feedback.txt","r");

    while(!feof($fileHandler)){

        $line=fgets($fileHandler);

        if(trim($line)!=""){

            $data=explode("~",$line);

            $feedback=array(
                "name"=>$data[0],
                "email"=>$data[1],
                "phone"=>$data[2],
                "mycombobox"=>$data[3],
                "message"=>$data[4]
            );

            $allFeedbacks[]=$feedback;
        }
    }

    fclose($fileHandler);

    return $allFeedbacks;
}

if(isset($_GET["delete"])){

    $deleteIndex=$_GET["delete"];

    $lines=file("feedback.txt");

    unset($lines[$deleteIndex]);

    file_put_contents("feedback.txt",implode("",$lines));

    header("Location: ".$_SERVER['PHP_SELF']);

    exit();
}

$AllFeedbacks=ListAllFeedBacks();

?>

  <!-- Main Content -->
            <main class="col-md-9 col-lg-10 px-4 py-4">
                <h2 class="mb-4">Messages</h2>

                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="card shadow-sm border-0 mb-3">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-user me-2"></i>Ahmed Mahmoud</h5>
                                <p class="card-text">Good evening, I'd like to volunteer for the upcoming food distribution event.</p>
                                <small class="text-muted">Received: Oct 30, 2025</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card shadow-sm border-0 mb-3">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-user me-2"></i>Fatma Ali</h5>
                                <p class="card-text">What else can I donate instead of money?</p>
                                <small class="text-muted">Received: Oct 28, 2025</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-user me-2"></i>Omar Youssef</h5>
                                <p class="card-text">Requesting information about Ramadan volunteering schedules in Alexandria.</p>
                                <small class="text-muted">Received: Oct 25, 2025</small>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>