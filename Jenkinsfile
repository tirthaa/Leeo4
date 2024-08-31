pipeline{
	agent any
	stages{
		stage("Start Grid"){
			steps{
				sh "docker-compose up -d selenium-hub3 chrome chrome1 chrome2 chrome3 chrome4 chrome5"
				}
			}
		stage("Run Test"){
			steps{				
				sh "mvn clean test  -P parallel -DsuiteXmlFile=/data/JENKINS/Jenkins_slaves/workspace/LeeoA/testng.xml"
				}
			}
		}
	post{
		always{
			archiveArtifacts artifacts: 'output/**'
			sh "docker-compose down"
		}
	}
}
