#
echo "# practica01" >> README.md
git init
git add README.md
git commit -m "first commit"
git branch -M main
echo "Quiere ingresar a github por url o mail y usurio: y(mail y usurio) o n(url)?"
read hookGithub
if test $hookGithub == "y";then
		echo "Ingrese mail de github:"
		read mailGithub
		echo "Ingrese usuario de github:"
		read userGithub
		echo "Ingrese nombre del proyecto como esat creado en github:"
		read namePGithub
		git config --global user.email ${mailGithub}
		git config --global user.name "${userGithub}"
		git remote add origin ${mailGithub}:${userGithub}/${namePGithub}.git
	else
		echo "Ingrese url de github:"
		read urlGithub
		git remote add origin ${urlGithub}
fi

git push -u origin main



echo $'\e[0;31m'se ejecuto corectamente en inicio de git con github$'\e[0m'
read -p $'\e[33m'"Press [Enter] key to continue..."$'\e[0m' foo