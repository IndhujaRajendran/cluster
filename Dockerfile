# base image
FROM node as builder

# set working directory
RUN mkdir /usr/devops
WORKDIR /usr/devops

# install and cache app dependencies

RUN npm install --silent


COPY . /usr/devops/app

RUN npm run build

# production environment
FROM nginx
COPY --from=builder /usr/devops/build /usr/share/nginx/html
EXPOSE 80
CMD ["nginx", "-g", "daemon off;"]
