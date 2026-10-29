pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                checkout scm
            }
        }

        stage('Prepare Environment') {
            steps {
                sh 'cp .env.docker .env'
            }
        }

        stage('Build Images') {
            steps {
                sh 'docker compose build'
            }
        }

        stage('Deploy') {
            steps {
                sh 'docker compose down || true'
                sh 'docker compose up -d'
            }
        }

        stage('Verify') {
            steps {
                sh '''
                for i in $(seq 1 24); do
                  curl -fs http://localhost:8000 > /dev/null && echo "App is up" && exit 0
                  echo "Waiting for app..."; sleep 5
                done
                exit 1
                '''
                sh 'docker compose ps'
            }
        }
    }

    post {
        failure {
            sh 'docker compose logs --tail=50 || true'
        }
    }
}
