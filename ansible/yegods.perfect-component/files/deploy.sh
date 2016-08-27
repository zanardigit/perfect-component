#!/usr/bin/env bash

rsync -avuz --exclude /language/ /vagrant/src/admin/ /var/www/joomla/administrator/components/com_helloworld/
rsync -avuz --exclude /language/ /vagrant/src/site/ /var/www/joomla/components/com_helloworld/
rsync -avuz /vagrant/src/media/ /var/www/joomla/media/com_helloworld/
rsync -avuz /vagrant/src/helloworld.xml /var/www/joomla/administrator/components/com_helloworld/
rsync -avuz /vagrant/src/admin/language/ /var/www/joomla/administrator/language/
rsync -avuz /vagrant/src/site/language/ /var/www/joomla/language/
