pipeline {
    agent linux
    environment {
        AUTHOR_EMAIL = """${sh(
            returnStdout: true,
            script: 'git show -s --format="%ae" HEAD | sed "s/^ *//;s/ *$//"'
        )}"""
    }
    stages{
        stage('Source') {
            git url: 'git@github.com:rdok/the-art-of-unit-testing-in-php.git', 
                credentialsId: 'cb82a506-329c-4dcb-af9c-63661e0a5f28'
        }
        stage('Build') {
            sh 'docker run --rm -v $PWD:/app composer install'
        }
        stage('Test') {
            sh 'docker run --rm -v $PWD:/app -w /app php:7.2-cli ./vendor/bin/phpunit'
        }
    }
    post {
        failure {
            emailext body: "Failure: ${err} <br/><br/> Console output at $BUILD_URL.", 
                subject: 'Failure: $BUILD_DISPLAY_NAME | $JOB_BASE_NAME', 
                to: "${AUTHOR_EMAIL}"
        }
    }
}

