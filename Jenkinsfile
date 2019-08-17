node {
    try {
        syntax-error
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
    } catch(err) {
        currentBuild.result = 'FAILURE'
        emailext body: "Failure: ${err} <br/><br/> Console output at $BUILD_URL.", 
        subject: 'Failure: $BUILD_DISPLAY_NAME | $JOB_BASE_NAME', 
        to: '$GIT_AUTHOR_EMAIL'
    }
}

