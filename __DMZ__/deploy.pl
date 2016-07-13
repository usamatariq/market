#!perl

use strict;
use Net::FTP;

my $host = "ftp.clonenine.com";
my $user = 'danceseen@clonenine.com';
my $password = "Projectds2014";

my $f = Net::FTP->new($host) or die "Can't open $host\n";
$f->login($user, $password) or die "Can't log $user in\n";

print "OK in!";