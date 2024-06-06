<?php

$output = `ls -la`;
echo $output;
sleep(1);

$output = `git add --all`;
echo $output;
sleep(2);

$output = `git config --global user.email "tirtha@kaashid.com"`;
echo $output;
sleep(3);

$output = `git config --global user.name "tirthaa"`;
echo $output;
sleep(4);

$output = `git commit -m "8th to Server"`;
echo $output;
sleep(5);

$output = `git remote set-url origin https://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@github.com/tirthaa/darsh.git`;
echo $output;
sleep(6);

$output = `git remote add github https://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@github.com/tirthaa/darsh.git`;
echo $output;
sleep(7);

$output = `git config --global  pull.ff true`;
echo $output;
sleep(8);

$output = `git push -u origin master`;
echo $output;
sleep(10);

?>