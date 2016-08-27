
SERIAL = false

$enable_serial_logging = false

Vagrant.configure(2) do |config|

  # Base box
  config.vm.box = "ubuntu/trusty32"

  # Do not check for updates
  config.vm.box_check_update = false

  # Forwarding
  config.vm.network "forwarded_port", guest: 80, host: 8080
  config.vm.network "forwarded_port", guest: 443, host: 8443
  config.vm.network :private_network, ip: '192.168.50.169'

  # Use NFS for shared folders for better performance
  config.vm.synced_folder '.', '/vagrant', nfs: true

  # Provision with Ansible
  config.vm.provision "ansible" do |ansible|
    ansible.playbook = "ansible/playbook.yml"
  end

  # VM hostname
  config.vm.hostname = "perfect-component"

  # Machine name
  config.vm.provider "virtualbox" do |v|
     v.name = "perfect-component"
     v.memory = 2048
  end

  if Vagrant.has_plugin?("vagrant-cachier")
    config.cache.scope = :box
    config.cache.synced_folder_opts = {
      type: :nfs,
      mount_options: ['rw', 'vers=3', 'tcp', 'nolock']
    }
  end

end
