#!/bin/sh
# clone a new copy of kirby and move the kirby directory to the project root

rm -rf temp

mkdir temp;

git clone git@github.com:getkirby/getkirby.com.git temp

rm -rf kirby

mv temp/kirby ./

rm -rf temp