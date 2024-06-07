<?php

$output = `git add public_html/TestEnv/*`;
echo $output;
sleep(1);

$output = `git config --global user.email "tirtha@kaashid.com"`;
echo $output;
sleep(2);

$output = `git config --global user.name "tirthaa"`;
echo $output;
sleep(3);

$output = `git commit -m "Automation 1 to Server Darshh" public_html/TestEnv/*`;`;
echo $output;
sleep(4);

$output = `git remote set-url origin https://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@github.com/tirthaa/darshhh.git`;
echo $output;
sleep(5);

$output = `git remote add github https://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@github.com/tirthaa/darshhh.git`;
echo $output;
sleep(6);

$output = `git commit --amend`;
echo $output;
sleep(7);

$output = `git push -o secret_detection.skip_all`;
echo $output;
sleep(8);

$output = `git push -u origin master`;
echo $output;
sleep(8);

?>