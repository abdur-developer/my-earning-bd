function isDeff(date1, date2) {
    // তারিখগুলির মিলি সেকেন্ডে পার্থক্য নিন
    var timeDifference = Math.abs(date1.getTime() - date2.getTime());

    // মিলি সেকেন্ড কে দিনে ভাগ করে আবার পূর্ণাঙ্কে প্রকাশ করুন
    var daysDifference = Math.floor(timeDifference / (1000 * 60 * 60 * 24));

    // যদি পার্থক্য 1 দিনের বেশি হয়, তাহলে true রিটার্ন করুন
    return daysDifference >= 1;
}

// দুইটি তারিখ তৈরি করুন
var today = new Date();
var previousDate = new Date('2023-12-01'); // আপনার প্রারম্ভিক তারিখটি এখানে সেট করুন

// ফাংশনটি কল করে দেখুন
var result = isDeff(today, previousDate);

// ফলাফল প্রকাশ করুন
console.log(result); // true বা false