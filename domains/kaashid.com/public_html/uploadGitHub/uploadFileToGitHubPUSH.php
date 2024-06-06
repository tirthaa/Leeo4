<?php

$output = `pwd`;
echo $output;
sleep(1);

$output = `git add --all`;
echo $output;
sleep(1);

$output = `git config --global user.email "tirtha@kaashid.com"`;
echo $output;
sleep(2);

$output = `git config --global user.name "tirthaa"`;
echo $output;
sleep(3);

$output = `git commit -m "Nineth to Server Darshh"`;
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

$output = `git push -u origin master`;
echo $output;
sleep(8);

?>