FROM docker:dind

# Install Docker from Docker Inc. repositories.

RUN apk update
RUN apk add
RUN apk add python-dev
RUN apk add libffi-dev
RUN apk add libressl-dev
RUN apk add py-pip
RUN apk add build-base
RUN pip install docker-compose
RUN apk add --no-cache openssh
