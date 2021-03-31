pipeline {
  agent any
  environment {
    PROJECT_NAME='myproject'
    DOMAIN='http://quiz.cloudwebapplication.ga/'
    STACK='EC2ContainerService-helloworld'
    DOCKER_REGISTRY='https://nivedhasugumaran/phpcert:latest.registry'
    CONTAINER='phpcert'
    VERSION="1.${BUILD_NUMBER}"
  }
  stages {
    /**stage('Tag Git Commit') {
      steps {
        sshagent (['jenkins']) {
            script {
                sh ''
                    git tag -a "v${VERSION}" -m "Jenkins"
                    git push origin "v${VERSION}" -vvv
                ''
            }
        }
      }
    }**/
    stage('Deploy'){
	   steps{	      
	       script{
          sh 'docker build . -t dockername/docker123:$Docker_tag'
          withCredentials([string(credentialsId: 'dockerpass', variable: 'dockerpass')]) {
                sh '''docker login -u Nivedhasugumaran -p adminpass123
                docker push nivedhasugumaran/docker123:$latest
                 '''
                }
			    }      
			      }

    stage('Deploy Stack') {
      steps {
          withCredentials([
              usernamePassword(
                  credentialsId: 'docker-registry-credentials',
                  usernameVariable: 'DOCKER_USER',
                  passwordVariable: 'DOCKER_PASSWORD'
              )
          ])
          {
            script {
                echo "Deploying Container Stack to Docker Cluster"
                sh "ansible-playbook -i devops/inventories/manager1/hosts devops/manager1.yml --extra-vars=\"{'WORKSPACE': '${env.WORKSPACE}', 'DOMAIN': '${env.DOMAIN}', 'PROJECT': '${env.PROJECT}', 'STACK': '${env.STACK}', 'VERSION' '${env.VERSION}', 'DOCKER_REGISTRY’: '${env.DOCKER_REGISTRY}’, 'DOCKER_USER': '${env.DOCKER_USER}', 'DOCKER_PASSWORD': '${env.DOCKER_PASSWORD}'}\" -vvv"
            }
          }
      }
    }
  }
}
