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

$output = `git commit -m "13 from Server Darshh"`;
echo $output;
sleep(4);

$output = `git remote set-url origin https://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@github.com/tirthaa/darshhh.git`;
echo $output;
sleep(5);

$output = `git remote add github https://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@github.com/tirthaa/darshhh.git`;
echo $output;
sleep(6);

$output = `git config --global  pull.ff true`;
echo $output;
sleep(7);

$output = `git pull origin master --allow-unrelated-histories`;
echo $output;
sleep(8);

?>