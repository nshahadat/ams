<?php
session_start();
error_reporting(0);
define('ROOT', 'C:/xampp/htdocs/ams');
// include ROOT . '/includes/header.php';
include ROOT . '/includes/db-config.php';

$apt = $_GET['apt'];
$month = $_GET['month'];
$year = $_GET['year'];

$invoicesql = "SELECT * FROM invoice WHERE apartment = '$apt' AND month = '$month' AND year = '$year'";
$invoiceresult = mysqli_query($mysqli, $invoicesql) or die(mysqli_error($mysqli));
$invoicedata = mysqli_fetch_assoc($invoiceresult);
$invoicerow = mysqli_num_rows($invoiceresult);

if ($invoicerow > 0) {
    ?>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>

    <body class="bg-white" onload="window.print()">
        <div class="max-h-screen bg-white">
            <div class="flex flex-col justify-start items-center">
                <p class="p-2">بِسْمِ اللهِ الرَّحْمٰنِ الرَّحِيْمِ</p>
                <p class="rounded-full bg-black text-white p-2">ঘর ভাড়ার রশিদ
                </p>
                <p class="p-2">তারিখ :
                    <?= date("Y-m-d") ?>
                </p>
                <p class="p-2">রশিদ নং :
                    <?= $invoicedata['invoiceID'] ?>
                </p>
                <div class="flex justify-evenly items-center w-[60vw]">
                    <p>ফ্ল্যাট নং: <span>
                            <?= $apt ?>
                        </span></p>
                    <p>চলতি মাস: <span>
                            <?= $month ?>
                        </span> সাল:
                        <?= $year ?>
                    </p>
                </div>
                <p class="float-left w-[60vw] pt-11">বিবরণ: </p>
                <div class="w-[60vw] flex flex-col">
                    <div class="flex w-[100%]">
                        <p class="w-[50%] p-2 flex justify-center items-center border border-black">মাসিক ভাড়া :</p>
                        <p class="w-[50%] p-2 flex justify-center items-center border border-black"><span>
                                <?= $invoicedata['monthlyRent'] ?>

                                &#2547;
                            </span></p>
                    </div>
                    <div class="flex w-[100%] h-[20vh]">
                        <p class="w-[50%] h-[100%] flex flex-col justify-center items-center border border-black">
                            <span>ইউটিলিটি বিল:</span>
                            <span>গ্যাস:</span>
                            <span>বিদ্যুৎ:</span>
                            <span>অন্যান্য:</span>
                        </p>
                        <p class="w-[50%] h-[100%] flex flex-col justify-center items-center border border-black">
                            <span>
                                <?= $invoicedata['gasBill'] ?>
                                &#2547;
                            </span>
                            <span>
                                <?= $invoicedata['elcBill'] ?>
                                &#2547;
                            </span>
                            <span>
                                <?= $invoicedata['otherBill'] ?>
                                &#2547;
                            </span>
                        </p>
                    </div>
                    <div class="flex w-[100%] h-[10%]">
                        <p class="w-[50%] p-2 flex flex-col justify-center items-center border border-black">
                            <span>পুর্ববর্তী বকেয়া:</span>
                            <span>মন্তব্য:</span>
                        </p>
                        <p class="w-[50%] p-2 flex justify-center items-center border border-black"><span>
                                <?= $invoicedata['rentDue'] ?>

                                &#2547;
                            </span></p>
                    </div>
                    <div class="flex w-[100%] h-[10%] pt-2">
                        <p class="w-[50%] p-2 flex justify-center items-center border border-black">সর্বমোট প্রদেয়:</p>
                        <p class="w-[50%] p-2 flex justify-center items-center border border-black"><span>
                                <?= $invoicedata['total'] ?>

                                &#2547;
                            </span></p>
                    </div>
                    <div class="flex w-[100%] h-[10%] pt-2">
                        <p class="w-[50%] p-2 flex justify-center items-center border border-black">আদায়:</p>
                        <p class="w-[50%] p-2 flex justify-center items-center border border-black"><span>
                                <?= $invoicedata['amount'] ?>

                                &#2547;
                            </span></p>
                    </div>
                    <div class="flex w-[100%] h-[10%]">
                        <p class="w-[50%] p-2 flex justify-center items-center border border-black">বকেয়া:</p>
                        <p class="w-[50%] p-2 flex justify-center items-center border border-black"><span>
                                <?= $invoicedata['newDue'] ?>

                                &#2547;
                            </span></p>
                    </div>
                    <div class="flex w-[100%] h-[10%] pt-10">
                        <p class="w-[50%] p-2 flex justify-center items-end">
                            .....................................</p>
                        <p class="w-[50%] p-2 flex justify-center items-end">
                            <span>.....................................</span>
                        </p>
                    </div>
                    <div class="flex w-[100%] h-[10%]">
                        <p class="w-[50%] p-2 flex justify-center items-center">প্রদানকারীর সাক্ষর:</p>
                        <p class="w-[50%] p-2 flex justify-center items-center">
                            <span>আদায়কারীর সাক্ষর:</span>
                        </p>
                    </div>
                    <p class="pt-4">
                        <span
                            class="pr-2">মন্তব্য:</span><span>...........................................................................................................................................</span>
                    </p>
                    <p class="mt-4 p-2 rounded-full border border-black"><i>বি: দ্রঃ চলতি মাসের ১০ তারিখের ভিতর ভাড়া পরিশোধ
                            করুন। ধন্যবাদ </i></p>
                </div>
            </div>
        </div>
    </body>
<?php } else { ?>

    <body>
        <h3>দু:ক্ষিত, আপনি ভুল ইনভয়েস খুজতেসেন, সঠিক তথ্য প্রদান করে পুনরায় চেষ্টা করুন। ধন্যবাদ। </h3>
        <a href="/ams/invoices.php"><button>Go Back</button>
        </a>
    </body>
<?php } ?>

<?php
include ROOT . '/includes/footer.php';
?>