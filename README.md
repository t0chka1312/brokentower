# BrokenTower CTF
BrokenTower is a vulnerable web-based CTF machine created as the final project for the 3rd evaluation of the Ethical Hacking module from the Cybersecurity in IT Environments vocational master's degree. This machine is designed to simulate a realistic multi-stage attack path and includes the following vulnerabilities:

🩻 Time-based Blind SQL Injection in the login form, allowing attackers to extract database credentials.

📤 Improper File Upload Filtering, which allows attackers to bypass file extension restrictions and upload a web shell.

🔁 Credential Reuse, where the same database credentials are reused in the web server environment, enabling lateral movement.

🔓 Privilege Escalation via LXD, where the compromised user is part of the lxd group and can escalate to root by leveraging LXD container abuse.

This CTF is ideal for practicing chained exploitation in a controlled and isolated environment.

Clone the repository and run the setup script as `root`:
``` bash
git clone https://github.com/youruser/brokentower.git
cd brokentower
sudo ./setup.sh
