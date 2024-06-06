<?php

$output = `ls -la`;
echo $output;
sleep(9);

$output = `git add --all`;
echo $output;
sleep(10);

$output = `git config --global user.email "tirtha@kaashid.com"`;
echo $output;
sleep(11);

$output = `git config --global user.name "tirthaa"`;
echo $output;
sleep(12);

$output = `git commit -m "Third to Server Darshh"`;
echo $output;
sleep(13);

$output = `git remote set-url origin https://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@github.com/tirthaa/darshh.git`;
echo $output;
sleep(14);

$output = `git remote add github https://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@github.com/tirthaa/darshh.git`;
echo $output;
sleep(15);

$output = `git config --global  pull.ff true`;
echo $output;
sleep(16);

$output = `git push -u origin master`;
echo $output;
sleep(17);

?>