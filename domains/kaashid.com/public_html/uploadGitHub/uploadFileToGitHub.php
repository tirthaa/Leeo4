<?php

$output = `git add --all`;
echo $output;
sleep(1);

$output = `git config --global user.email "tirtha@kaashid.com"`;
echo $output;
sleep(2);

$output = `git config --global user.name "tirthaa"`;
echo $output;
sleep(3);

$output = `git commit -m "Second to Server Darshh"`;
echo $output;
sleep(4);

$output = `git remote set-url origin https://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@github.com/tirthaa/darshh.git`;
echo $output;
sleep(5);

$output = `git remote add github https://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@github.com/tirthaa/darshh.git`;
echo $output;
sleep(6);

$output = `git config --global  pull.ff true`;
echo $output;
sleep(7);

$output = `git pull origin master --allow-unrelated-histories`;
echo $output;
sleep(8);

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